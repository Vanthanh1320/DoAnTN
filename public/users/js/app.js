const urlStr=window.location.pathname;

const selectBtn=document.querySelectorAll('.content__select-btn');
const valiForm=document.querySelectorAll('.content-validation');
const cvItemBtn=document.querySelectorAll('.cv-btn-item');
const tabBtn=document.querySelectorAll('.tab-btn');
const employerEl=document.querySelectorAll('.employer-main');



const hideText=document.querySelector('.search__keys-text');
const headerEl=document.querySelector('.header');
const cvBtnList=document.querySelector('.cv-btn');
const btnAddExp=document.querySelector('.experience-add');
const btnAddEdu=document.querySelector('.education-add');
const cvExpEl=document.querySelector('.cv-experience-list');
const cvEduEl=document.querySelector('.cv-education-list');
const btnChange=document.querySelector('.btn-change');
const btnCloseChange=document.querySelector('.btn-close-change');


// const formEl=document.querySelector('.form');



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

if(btnAddExp){
    btnAddExp.addEventListener('click',newExperience);
}

function newExperience(){
    const liElement=cvExpEl.querySelectorAll('li');

    var li=document.createElement('li');
    li.className="pt-5";

    for(var i=0;i<liElement.length;i++){
        li.innerHTML=`
            <hr class="my-5">
            <div class="mb-5 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tên công ty <span class=" red-cl">(*)</span></label>
                <div class="col-sm-7 col-md-7 col-xl-5">
                    <input type="text" class="form-control" name="company-${i+1}" id="" required>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thời gian làm việc <span class=" red-cl">(*)</span></label>
                <div class="col-sm-7 col-md-7 col-xl-5">
                    <input type="text" class="form-control" name="time-${i+1}" id="" required>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Vị trí công việc <span class=" red-cl">(*)</span></label>
                <div class="col-sm-7 col-md-7 col-xl-5">
                    <input type="text" class="form-control" name="posistion-${i+1}" id="" required>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Chi tiết công việc </label>
                <div class="col-sm-7 col-md-7 col-xl-8">
                    <textarea  class="form-control" name="description-${i+1}" id="" cols="50" rows="5"></textarea>
                </div>
            </div>
            <div class="cv-experience-remove col-sm-2 text-end">
                <span class="btn btn-danger experience-remove" >Xóa</span>
            </div>
        `;
    }

    cvExpEl.appendChild(li);

    for(var i=0; i<removeExpBtn.length;i++){

        if(removeExpBtn.length > 1){
            removeExpBtn[0].style.opacity="1";
        }

        removeExpBtn[i].onclick=function(){
            var liParent=this.parentElement;
            liParent.style.display="none";
        }
    }
}
const removeExpBtn=document.getElementsByClassName('cv-experience-remove');

for(var i=0; i<removeExpBtn.length;i++){
    if(removeExpBtn.length < 2 ){
        removeExpBtn[0].style.opacity="0";
    }

    removeExpBtn[i].onclick=function(){
        var liParent=this.parentElement;
        console.log(liParent);
        liParent.style.display="none";
    }
}


if(btnAddEdu){
    btnAddEdu.addEventListener('click',newEducation);
}

function newEducation(){
    const liElement=cvEduEl.querySelectorAll('li');

    var li=document.createElement('li');

    for(var i=0;i<liElement.length;i++){
        li.innerHTML=`
            <hr class="my-5">
            <div class="mb-5 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Tên trường cơ sở đào tạo <span class=" red-cl">(*)</span></label>
                <div class="col-sm-7 col-md-7 col-xl-5">
                    <input type="text" class="form-control" name="school-${i+1}" id="" required>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thời gian học <span class=" red-cl">(*)</span></label>
                <div class="col-sm-7 col-md-7 col-xl-5">
                    <input type="text" class="form-control" name="year-${i+1}" id="" required>
                </div>
            </div>
            <div class="mb-5 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Ngành học <span class=" red-cl">(*)</span></label>
                <div class="col-sm-7 col-md-7 col-xl-5">
                    <input type="text" class="form-control" name="degree-${i+1}" id="" required>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="" class="col-sm-3 col-md-3 col-xl-3 col-form-label">Thông tin khác </label>
                <div class="col-sm-7 col-md-7 col-xl-8">
                    <textarea class="form-control" name="info-${i+1}" id="" cols="50" rows="5"></textarea>
                </div>
            </div>

            <div class="cv-education-remove col-sm-2 text-end">
                <span class="btn btn-danger experience-remove" >Xóa</span>
            </div>
        `;
    }

    cvEduEl.appendChild(li);

    for(var i=0; i<removeEduBtn.length;i++){

        if(removeEduBtn.length > 1){
            removeEduBtn[0].style.opacity="1";
        }

        removeEduBtn[i].onclick=function(){
            var liParent=this.parentElement;
            liParent.style.display="none";
        }
    }
}
const removeEduBtn=document.getElementsByClassName('cv-education-remove');

for(var i=0; i<removeEduBtn.length;i++){
    if(removeEduBtn.length < 2 ){
        removeEduBtn[0].style.opacity="0";
    }

    removeEduBtn[i].onclick=function(){
        var liParent=this.parentElement;
        console.log(liParent);
        liParent.style.display="none";
    }
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

// if(cvItemBtn){
//     cvItemBtn.forEach((item,index)=>{

//         item.onclick=(e)=>{
//             const btn=document.querySelector('.cv-btn-item > .btn-submit');
//             btn.classList.remove('btn-submit');

//            const dataset=item.lastElementChild.getAttribute('data-set');

//             if(index === parseInt(dataset)){
//                 item.lastElementChild.classList.add('btn-submit');
//             }
//         }
//     })
// }

var loadFile = function (event) {
    var showImage=document.querySelector('.account-right-img > img');
    showImage.src=URL.createObjectURL(event.target.files[0]);

}
