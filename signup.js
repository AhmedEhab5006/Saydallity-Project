function help(){
    alert("If you need any help ask here SيDILITI@gmail.com");
}
function changestep(btn){}
const steps = Array.from(document.querySelectorAll('form .step'));
const nextBTN = document.querySelectorAll('form .nbtn');
const prevBTN = document.querySelectorAll('form .pbtn');
const form = document.querySelector('form');
nextBTN.forEach(button=>{
    button.addEventListener('click',()=>{
        changestep('Next');
    })
})
prevBTN.forEach(button=>{
    button.addEventListener('click',()=>{
        changestep('Prev');
    })
})

function changestep(btn){
    let index=0;
    const active = document.querySelector('form .step.active');
    index = steps.indexOf(active);
    console.log(steps[index])
    steps[index].classList.replace('active','step');
    if(btn === 'Next'){
        index ++;
    }
    else if(btn === 'Prev'){
        index --;
    }
    steps[index].classList.add('active')
    console.log(index)
}