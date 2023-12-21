
// get the buttons 
document.getElementById('calculateBillBtn').addEventListener('click', calculateBill);
document.getElementById('okBtn').addEventListener('click', closeModal);
document.getElementById('clearBtn').addEventListener('click', clearSelections);
// function to calculate the bill 
function calculateBill() {
  // strat with 0 
  let total = 0;
  let selectedServiceCount = 0;
  let discount = 0;
  let selectedServices = '';
// assign the 8 survices 
  const serviceNames = ['PHOTOGRAPHER', 'DESIGNER','BUISNESS MANAGER','TUTOR' , 'WRITER' ,'ARTIST','TRANSLATOR','PROGRAMMER'];
// adding the selected survices 
  serviceNames.forEach((serviceName, index) => {
    const selectedService = document.querySelector(`select[name="${serviceName}"]`).value;
    if (selectedService !== '') {
      const price = parseInt(selectedService, 10);
      total += price;
      selectedServiceCount++;
      selectedServices += `<tr><td>${serviceName}</td><td>OMR ${price.toFixed(2)}</td></tr>`;
    }
  });
// count the number of selected survices 
  if (selectedServiceCount > 2) {
    discount = total * 0.2; // 20% discount
    total -= discount;
  }
// to add the selected to table 
  const selectedServicesBody = document.getElementById('selectedServicesBody');
  selectedServicesBody.innerHTML = selectedServices;
// add the total and discount price 
  const totalPriceElem = document.getElementById('totalPrice');
  const discountPriceElem = document.getElementById('discountPrice');
// print the toral 
  totalPriceElem.innerHTML = `Total: OMR ${total.toFixed(2)}`;
  discountPriceElem.innerHTML = `Discount: OMR ${discount.toFixed(2)}`;
// display the bill
  const modal = document.getElementById('billModal');
  modal.style.display = 'block';
}
// to close the bill
function closeModal() {
  const modal = document.getElementById('billModal');
  modal.style.display = 'none';
}
// clear the all selected survices 
function clearSelections() {
  const serviceNames =  ['PHOTOGRAPHER', 'DESIGNER','BUISNESS MANAGER','TUTOR' , 'WRITER' ,'ARTIST','TRANSLATOR','PROGRAMMER'];
// // display each survice with the offer selected 
  serviceNames.forEach((serviceName) => {
    document.querySelector(`select[name="${serviceName}"]`).selectedIndex = 0;
  });
}
