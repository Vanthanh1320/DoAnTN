const selectBtn=document.querySelectorAll('.content__select-btn');
const valiForm=document.querySelectorAll('.content-validation');
const tabBtn=document.querySelectorAll('.tab-btn');
const employerEl=document.querySelectorAll('.employer-main');
const selectTabBtn=document.querySelectorAll('.select-tab');
const filesUpload=document.querySelectorAll('.detail-files-upload');

const hideText=document.querySelector('.search__keys-text');
const headerEl=document.querySelector('.header');
const cvBtnList=document.querySelector('.cv-btn');
const btnChange=document.querySelector('.btn-change');
const btnCloseChange=document.querySelector('.btn-close-change');
const faSave=document.querySelector('.fa-regular');
const saveJobHtml=document.querySelector('.save-job-list');
const recruitmentListHtml=document.querySelector('.recruitment-list');
const selectupload=document.querySelector('.detail-select-upload');



window.addEventListener('scroll',function(){
    if(document.documentElement.scrollTop > 100){
        headerEl.classList.add('shrink');

        if(cvBtnList){
            cvBtnList.classList.add('is-fixed');
            // formEl.setAttribute('style','margin-top:20px')
        }
    }else{
        headerEl.classList.remove('shrink');

        if(cvBtnList){
            cvBtnList.classList.remove('is-fixed');
        }
    }
});


if(selectBtn){
   selectBtn.forEach((btn)=>{
        const type=btn.getAttribute('type-data');

        btn.onclick=(e)=>{
            const active=document.querySelector('button.active-btn');
            active.classList.remove('active-btn');

            valiForm.forEach((vali)=>{
                if(type === vali.getAttribute('type-data')){
                    btn.classList.add('active-btn');
                    vali.classList.remove('hide');
                }else{
                    vali.classList.add('hide')
                }
            })
        }
   })
}

if(hideText){
    hideText.addEventListener('click',(e)=>{
        const parent=e.target.offsetParent;
        parent.setAttribute('style','display:none');
    })
}

if(tabBtn){
    tabBtn.forEach((btn)=>{
        btn.onclick=(e)=>{
            const id=e.target.dataset.id;

            const show=document.querySelector('.tab-btn.show');
            show.classList.remove('show');

            employerEl.forEach((item)=>{

                if(id === item.id){
                    item.classList.add('show');
                    btn.classList.add('show');
                }else{
                    item.classList.remove('show');
                }
            })
        }
    })
}



if(btnChange){
    btnChange.addEventListener('click',(e)=>{

        const inputChangeEl=document.querySelector('.input-change');
        const pElm=document.querySelector('.change-form>p');

        inputChangeEl.classList.remove('hide');
        btnCloseChange.classList.remove('hide');
        btnChange.classList.add('hide');
        pElm.classList.add('hide');
    });
}

if(btnCloseChange){
    btnCloseChange.addEventListener('click',(e)=>{

        const inputChangeEl=document.querySelector('.input-change');
        const pElm=document.querySelector('.change-form>p');

        inputChangeEl.classList.add('hide');
        btnCloseChange.classList.add('hide');
        btnChange.classList.remove('hide');
        pElm.classList.remove('hide');
    });
}


var loadFile = function (event) {
    var showImage=document.querySelector('.account-right-img > img');
    var show=document.querySelector('.img > img');

    if (show){
        show.src=URL.createObjectURL(event.target.files[0]);
        show.setAttribute('style','display:block');
    }else {
        showImage.src=URL.createObjectURL(event.target.files[0]);
    }

}


// Việc ứng tuyển - Việc đã lưu
var id_user=document.querySelector('.header__nav-user input[name="id_user"]');
var dataSavePost=JSON.parse(localStorage.getItem('savePost'));
var dataRecruitmentList=JSON.parse(localStorage.getItem('recruitment_list'));

function getDataPost(id_post) {
    var title=document.querySelector('.detail-job-head > input[name="title"]').value;
    var slug=document.querySelector('.detail-job-head > input[name="slug"]').value;
    var image=document.querySelector('.detail-job-head > input[name="image"]').value;
    var company=document.querySelector('.detail-job-head > input[name="company"]').value;
    var salary_max=document.querySelector('.detail-job-head > input[name="salary_max"]').value;
    var salary_min=document.querySelector('.detail-job-head > input[name="salary_min"]').value;
    var kills=document.querySelector('.detail-job-head > input[name="kills"]').value;
    var time=document.querySelector('.detail-job-head > input[name="time"]').value;
    var address=document.querySelector('.detail-job-head > input[name="address_work"]').value;

    var killsArray=kills.split(',');

    return {
        'id_user':Number.parseInt(id_user.value),
        'id_post':id_post,
        'title':title,
        'slug':slug,
        'image':image,
        'company':company,
        'salary_max':salary_max,
        'salary_min':salary_min,
        'kills':killsArray,
        'time':time,
        'address':address,
    }
}

function savePost(id_post) {
    if (id_user !== null){
        const data=getDataPost(id_post);

        if(localStorage.getItem('savePost') == null){
            localStorage.setItem('savePost','[]');
        }

        var response=JSON.parse(localStorage.getItem('savePost'));

        var count_data=response.filter((item)=> {
            return item.id_post === id_post && item.id_user === parseInt(data.id_user);
        })

        if (count_data.length == 0){
            faSave.setAttribute('class','fa-solid fa-bookmark')
            response.push(data);
            showSuccessToast();
            return  localStorage.setItem('savePost',JSON.stringify(response));
        }else {
            var id_delete=response.filter((item)=>{
                return item.id_post !== id_post || item.id_user !== parseInt(data.id_user);
            })
            faSave.setAttribute('class','fa-regular fa-bookmark')

            return  localStorage.setItem('savePost',JSON.stringify(id_delete))
        }
    }else {
        return location.assign('/login');
    }
}

function handleRecruitment(id_post) {
    var data= getDataPost(id_post);

    if (localStorage.getItem('recruitment_list') === null){
        localStorage.setItem('recruitment_list','[]')
    }

    var response=JSON.parse(localStorage.getItem('recruitment_list'));

    response.push(data);
    localStorage.setItem('recruitment_list',JSON.stringify(response));
}

function showPostList(data,divHtml) {
    var html=``;

    if (+data.length > 0 && id_user){
        data.map((item)=>{
            if (item.id_user === Number.parseInt(id_user.value) && divHtml){
                html+=`
                <a class="posts-item py-3 px-3" href="tim-viec/${item.slug}">
                    <div class="posts-item-img">
                        <img src="${'empl/img/'+item.image}" alt="logo-company">
                    </div>

                     <div class="posts-item-info ms-4 me-auto">
                                <h2 class="posts-item-info__title">${item.title}</h2>
                                <p class="posts-item-info__company">${item.company}</p>
                                <div class="posts-item-info__address">
                                    <p>
                                        <i class="fa-solid fa-location-dot"></i>
                                        ${item.address}
                                    </p>
                                </div>
                                <div class="posts-item-info__salary">
                                    <p>
                                        <i class="fa-solid fa-money-bill-wave"></i>
                                        ${item.salary_min} - ${item.salary_max}
                                    </p>
                                </div>
                                <div class="posts-item-info__kills">
                                    ${item.kills.map((kill)=>{
                        return `
                                            <span>${kill}</span>
                                        `
                    }).join('')}
                                </div>
                            </div>

                            <div class="posts-item-timer">
                                <p>${item.time}</p>
                            </div>
                 </a>
            `
                return  divHtml.innerHTML=html;
            }

        })

    }
}

if (recruitmentListHtml){
    showPostList(dataRecruitmentList,recruitmentListHtml);
}else {
    showPostList(dataSavePost,saveJobHtml);
}

if (faSave && dataSavePost){
    dataSavePost.map((item)=>{
        if (item.id_post === parseInt(faSave.dataset.set) && item.id_user === Number.parseInt(id_user.value)){
            return  faSave.setAttribute('class','fa-solid fa-bookmark')
        }
    })
}

// --------------


if(selectupload){
    var title=document.querySelector('.detail-job-head > input[name="title"]').value;
    var slug=document.querySelector('.detail-job-head > input[name="slug"]').value;
    var image=document.querySelector('.detail-job-head > input[name="image"]').value;
    var company=document.querySelector('.detail-job-head > input[name="company"]').value;
    var salary_max=document.querySelector('.detail-job-head > input[name="salary_max"]').value;
    var salary_min=document.querySelector('.detail-job-head > input[name="salary_min"]').value;
    var time=document.querySelector('.detail-job-head > input[name="time"]').value;
    var address=document.querySelector('.detail-job-head > input[name="address_work"]').value;

    selectupload.onclick=(e)=>{
        e.preventDefault();
        const id=e.target.dataset.id;

        if(id){
            selectTabBtn.forEach((tab)=>{
                tab.classList.remove('active-tab');
                e.target.classList.add('active-tab');
            });

            filesUpload.forEach((item)=>{
                item.classList.remove('active-tab');
                const element=document.getElementById(id);
                element.classList.add('active-tab');
            })
        }
    }

    const inputFile=document.querySelector('.detail-files-upload>input');

    inputFile.addEventListener('change',function (e) {
        const inputDocumnets=document.querySelectorAll('input[name="document"]');
        inputDocumnets.forEach(item=>{
            item.checked = false;
        })
    })

}


function toast({title='', message='', type='info', duration=2000}) {
    const main=document.getElementById('toast');
    if(main){
        const toast=document.createElement('div');

        //Remove tấ cả toast
        const autoRemoveId =setTimeout(function () {
            main.removeChild(toast);
        },duration + 1000);

        //Remove khi click vào close
        toast.onclick=function(e){
            if(e.target.closest('.toast__close')){
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        }
        const icons={
            success:'fas fa-check-circle',
            info:'fa fa-info-circle',
            warning:'fa fa-exclamation-circle',
            error:'fa fa-exclamation-circle',
        };
        const icon=icons[type];
        const delay=(duration / 1000).toFixed(2); //chia thời gian


        toast.classList.add('toast-show',`toast--${type}`);
        toast.style.animation=`animation: sliderInLeft ease ${delay}s, Fadeout linear 1s 3s forwards;`;

        toast.innerHTML= `
                <div class="toast__icon">
                    <i class="${icon}"></i>
                </div>
                <div class="toast__body">
                    <h1 class="toast__title">${title}</h1>
                    <p class="toast__msg">${message}</p>
                </div>
                <div class="toast__close">
                    <i class="fas fa-times"></i>
                 </div>
            `;
        main.appendChild(toast);
    }
}

function showSuccessToast(){
    toast({
        title:'Success',
        message:'Việc làm đã được lưu',
        type:'success',
        duration:50000
    })
}

