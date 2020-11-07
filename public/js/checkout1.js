const inputs = document.querySelectorAll(".field__input");

document.addEventListener("DOMContentLoaded", ()=>{
    inputs.forEach(input => {
        if(input.value != ""){
            input.nextElementSibling.classList.add("input-active");
        }
    })
});

inputs.forEach(input => {
    input.addEventListener("focus", ()=>{
            input.nextElementSibling.classList.add("input-active");
            input.parentElement.style.borderColor = "black";
    });
    input.addEventListener("blur", ()=>{
        input.parentElement.style.borderColor = "rgb(193,193,193)";
        if (input.value == ""){
            input.nextElementSibling.classList.remove("input-active");
        }
    });
    // input.addEventListener("input", ()=>{
    //     if (input.value != ""){
    //         input.nextElementSibling.classList.add("input-active");
    //     } else {
    //         input.nextElementSibling.classList.remove("input-active");
    //     }
    //     console.log(input.value);
    // });
});