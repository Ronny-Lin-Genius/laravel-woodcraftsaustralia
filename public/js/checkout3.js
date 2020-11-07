const billing_address_radios = document.querySelectorAll(".billing-address__radio");
billing_address_radios.forEach(radio => {
    radio.addEventListener("change", ()=>{
        const billing_form = document.querySelector(".billing-form");
        if(radio.getAttribute("id") == "different"){
            billing_form.classList.add("display-grid");
            billing_form.classList.remove("display-none");
            const inputs = document.querySelectorAll(".field__input");
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
        } else{
            billing_form.classList.add("display-none");
            billing_form.classList.remove("display-grid");
        }
    });
});