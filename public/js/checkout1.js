const inputs = document.querySelectorAll(".infomation-form .field__input");
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
});


// Billing Form
const billing_address_radios = document.querySelectorAll(".billing-address__radio");
billing_address_radios.forEach(radio => {
    radio.addEventListener("change", ()=>{
        const billing_form = document.querySelector(".billing-form");
        const inputs = document.querySelectorAll(".billing-form .field__input");
        if(radio.getAttribute("id") == "different"){
            billing_form.classList.add("display-grid");
            billing_form.classList.remove("display-none");
            inputs.forEach(input => {
                input.disabled = false;
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
            });
        } else{
            billing_form.classList.add("display-none");
            billing_form.classList.remove("display-grid");
            inputs.forEach(input => {
                input.disabled = true;
            });

        }
    });
});