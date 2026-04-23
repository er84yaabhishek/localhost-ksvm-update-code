
// ///////////// For Variant Add //////////

// function addVariant() {
//     // Create the outer container div
//     let variantBox = document.createElement('div');
//     variantBox.classList.add('row', 'variant-box');

//     // Create the variant input section
//     let variantColLg11 = document.createElement('div');
//     variantColLg11.classList.add('col-lg-11', 'p-0');
//     let formGroup = document.createElement('div');
//     formGroup.classList.add('form-group');
//     let label = document.createElement('label');
//     label.textContent = 'Variant Name';
//     let input = document.createElement('input');
//     input.setAttribute('name', 'variant_names[]');
//     input.setAttribute('type', 'text');
//     input.classList.add('form-control');
//     input.setAttribute('placeholder', 'eg. Small, Regular, Big etc...');
//     formGroup.appendChild(label);
//     formGroup.appendChild(input);
//     variantColLg11.appendChild(formGroup);

//     // Create the remove button
//     let variantColLg1 = document.createElement('div');
//     variantColLg1.classList.add('col-lg-1');
//     let removeBtn = document.createElement('button');
//     removeBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'text-white', 'mt-5');
//     removeBtn.setAttribute('type', 'button');
//     removeBtn.setAttribute('onclick', 'removeVariant(this)');
//     let icon = document.createElement('i');
//     icon.classList.add('fas', 'fa-times');
//     removeBtn.appendChild(icon);
//     variantColLg1.appendChild(removeBtn);

//     // Create the Add Option button
//     let addOptionBtnCol = document.createElement('div');
//     addOptionBtnCol.classList.add('col-lg-12');
//     let addOptionBtn = document.createElement('button');
//     addOptionBtn.classList.add('btn', 'btn-success', 'btn-sm');
//     addOptionBtn.setAttribute('type', 'button');
//     addOptionBtn.setAttribute('onclick', 'addOption(this)');
//     addOptionBtn.textContent = 'Add Option';
//     addOptionBtnCol.appendChild(addOptionBtn);

//     // Append the sections to the variantBox container
//     variantBox.appendChild(variantColLg11);
//     variantBox.appendChild(variantColLg1);
//     variantBox.appendChild(addOptionBtnCol);

//     // Create the options row container (initially empty)
//     let optionsRow = document.createElement('div');
//     optionsRow.classList.add('row');
//     variantBox.appendChild(optionsRow);

//     // Append the variant box to the parent container (adjust the parent element as per your structure)
//     document.getElementById('variants-container').appendChild(variantBox); // Ensure there's a container with ID "variants-container"
// }

// function removeVariant(button) {
//     let variantBox = button.closest('.variant-box');
//     variantBox.remove();
// }


// function addOption(button) {
//     let variantBox = button.closest('.variant-box');
//     let optionsRow = variantBox.querySelector('.row');

//     // Create the option input fields dynamically
//     let optionRow = document.createElement('div');
//     optionRow.classList.add('col-lg-12'); // Directly append the option row as a child of .row

//     let optionColLg6 = document.createElement('div');
//     optionColLg6.classList.add('col-lg-6');
//     let optionInputGroup = document.createElement('div');
//     optionInputGroup.classList.add('form-group');
//     let optionLabel = document.createElement('label');
//     optionLabel.textContent = 'Option';
//     let optionInput = document.createElement('input');
//     optionInput.setAttribute('type', 'text');
//     optionInput.classList.add('form-control');
//     optionInput.setAttribute('placeholder', 'e.g. Small, Regular, Big etc...');
//     optionInputGroup.appendChild(optionLabel);
//     optionInputGroup.appendChild(optionInput);
//     optionColLg6.appendChild(optionInputGroup);

//     let optionColLg5 = document.createElement('div');
//     optionColLg5.classList.add('col-lg-5');
//     let priceInputGroup = document.createElement('div');
//     priceInputGroup.classList.add('form-group');
//     let priceLabel = document.createElement('label');
//     priceLabel.textContent = 'Price (USD)';
//     let priceInput = document.createElement('input');
//     priceInput.setAttribute('type', 'text');
//     priceInput.classList.add('form-control');
//     priceInput.setAttribute('autocomplete', 'off');
//     priceInputGroup.appendChild(priceLabel);
//     priceInputGroup.appendChild(priceInput);
//     optionColLg5.appendChild(priceInputGroup);

//     let removeOptionBtnCol = document.createElement('div');
//     removeOptionBtnCol.classList.add('col-lg-1');
//     let removeOptionBtn = document.createElement('button');
//     removeOptionBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'text-white', 'mt-5');
//     removeOptionBtn.setAttribute('type', 'button');
//     removeOptionBtn.setAttribute('onclick', 'removeOption(this)');
//     let optionIcon = document.createElement('i');
//     optionIcon.classList.add('fas', 'fa-times');
//     removeOptionBtn.appendChild(optionIcon);
//     removeOptionBtnCol.appendChild(removeOptionBtn);

//     // Append the option columns to the option row
//     optionRow.appendChild(optionColLg6);
//     optionRow.appendChild(optionColLg5);
//     optionRow.appendChild(removeOptionBtnCol);

//     // Append the option row to the options row container
//     optionsRow.appendChild(optionRow);
// }

// // Function to remove a single option
// function removeOption(button) {
//     let optionRow = button.closest('.col-lg-12'); // Remove only the specific option row
//     optionRow.remove();
// }


// // Function to add a new variant
// function addVariant() {
//     const variantContainer = document.getElementById("variant-container");
    
//     // Create a new variant element (clone)
//     const newVariant = document.querySelector(".variant").cloneNode(true);

//     // Append the new variant to the variant container
//     variantContainer.appendChild(newVariant);
// }

// // Function to remove a specific variant
// function removeVariant(button) {
//     // Find the parent variant container and remove it
//     button.closest('.variant').remove();
// }

// // Function to add an option to a specific variant
// function addOption(button) {
//     const variant = button.closest('.variant');  // Get the parent variant
//     const optionsContainer = variant.querySelector('.options-container');  // Get the options container

//     const variantname = document.getElementById("variant-container");

//     // Create a new option element
//     const newOption = document.createElement('div');
//     newOption.classList.add('option');

//     newOption.innerHTML = `
//         <div class="row">
//             <div class="col-lg-6">
//                 <div class="form-group">
//                     <label for="">Option</label>
//                     <input type="text" class="form-control" placeholder="eg. Small, Regular, Big etc...">
//                 </div>
//             </div>
//             <div class="col-lg-5">
//                 <div class="form-group">
//                     <label for="">Price (USD)</label>
//                     <input type="text" class="form-control ltr" autocomplete="off">
//                 </div>
//             </div>
//             <div class="col-lg-1">
//                 <button class="btn btn-danger btn-sm text-white mt-5 rmvbtn" type="button" onclick="removeOption(this)">
//                     <i class="fas fa-times"></i>
//                 </button>
//             </div>
//         </div>
//     `;

//     // Append the new option to the options container
//     optionsContainer.appendChild(newOption);
// }

// // Function to remove a specific option
// function removeOption(button) {
//     // Find the parent option container and remove it
//     button.closest('.option').remove();
// }


// Function to add a new variant
function addVariant() {
    const variantContainer = document.getElementById("variant-container");

    // Get the number of existing variants
    const variantCount = document.querySelectorAll('.variant').length;

    // Create a new variant element (clone)
    const newVariant = document.querySelector(".variant").cloneNode(true);

    // Update the data-index attribute and the name attributes for variant and options
    const newIndex = variantCount;
    newVariant.setAttribute('data-index', newIndex);

    // Update the name attribute for the variant name input
    const variantNameInput = newVariant.querySelector('input[name^="variant_names"]');
    variantNameInput.setAttribute('name', `variant_names[${newIndex}]`);

    // Update the name attributes for each option within this variant
    const options = newVariant.querySelectorAll('.option');
    options.forEach((option, optionIndex) => {
        option.setAttribute('data-index', optionIndex);
        const optionNameInput = option.querySelector('input[name^="variant_"][name$="[name]"]');
        optionNameInput.setAttribute('name', `variant_${newIndex}_options[${optionIndex}][name]`);
        const optionPriceInput = option.querySelector('input[name^="variant_"][name$="[price]"]');
        optionPriceInput.setAttribute('name', `variant_${newIndex}_options[${optionIndex}][price]`);
    });

    // Append the new variant to the variant container
    variantContainer.appendChild(newVariant);
}

// Function to remove a specific variant
function removeVariant(button) {
    button.closest('.variant').remove();
}

// Function to add an option to a specific variant
function addOption(button) {
    const variant = button.closest('.variant');  // Get the parent variant
    const optionsContainer = variant.querySelector('.options-container');  // Get the options container

    // Get the number of existing options in this variant
    const optionCount = variant.querySelectorAll('.option').length;

    // Create a new option element
    const newOption = document.createElement('div');
    newOption.classList.add('option');
    newOption.setAttribute('data-index', optionCount);

    // Set the name attributes for the option inputs dynamically
    newOption.innerHTML = `
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Option</label>
                    <input name="variant_${variant.dataset.index}_options[${optionCount}][name]" type="text" class="form-control" placeholder="eg. Small, Regular, Big etc...">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="">Price (USD)</label>
                    <input name="variant_${variant.dataset.index}_options[${optionCount}][price]" type="text" class="form-control ltr" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-1">
                <button class="btn btn-danger btn-sm text-white mt-5 rmvbtn" type="button" onclick="removeOption(this)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    `;

    // Append the new option to the options container
    optionsContainer.appendChild(newOption);
}

// Function to remove a specific option
function removeOption(button) {
    button.closest('.option').remove();
}




// Function to add a new add-on
function addAddOn() {
    const addonContainer = document.getElementById("addon-container");

    // Get the number of existing add-ons
    const addonCount = document.querySelectorAll('.addon').length;

    // Create a new add-on element (clone)
    const newAddon = document.querySelector(".addon").cloneNode(true);

    // Update the data-index attribute and the name attributes for addon name and price
    const newIndex = addonCount;
    newAddon.setAttribute('data-index', newIndex);

    // Update the name attributes for the add-on fields
    const addonNameInput = newAddon.querySelector('input[name^="addon_names"]');
    addonNameInput.setAttribute('name', `addon_names[${newIndex}]`);

    const addonPriceInput = newAddon.querySelector('input[name^="addon_prices"]');
    addonPriceInput.setAttribute('name', `addon_prices[${newIndex}]`);

    // Append the new add-on to the addon container
    addonContainer.appendChild(newAddon);
}

// Function to remove a specific add-on
function removeAddOn(button) {
    button.closest('.addon').remove();
}
