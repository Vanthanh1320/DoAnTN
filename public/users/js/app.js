
const selectBtn=document.querySelectorAll('.content__select-btn');
const valiForm=document.querySelectorAll('.content-validation');
const cvItemBtn=document.querySelectorAll('.cv-btn-item');
const tabBtn=document.querySelectorAll('.tab-btn');
const employerEl=document.querySelectorAll('.empl-main');


const hideText=document.querySelector('.search__keys-text');
const headerEl=document.querySelector('.header');
const cvBtnList=document.querySelector('.cv-btn');
const btnChange=document.querySelector('.btn-change');
const btnCloseChange=document.querySelector('.btn-close-change');


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

mobiscroll.select('#multiple-select', {
    inputElement: document.getElementById('my-input'),
    touchUi: false
});

mobiscroll.select('#multiple-select2', {
    inputElement: document.getElementById('my-input2'),
    touchUi: false
});
