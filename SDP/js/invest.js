function computeInterest(){
    //The global constants of some class functions(value) are determined using the following three line codes
    const amounts = document.querySelector('#amounts').value;
    const interest_rates = document.querySelector('#interest_rates').value;
    const month = document.querySelector('#month').value;
    
    //The interest rate has been calculated.
    //The total amount of interest per month has been calculated by the following calculation.
    //That calculation is stored in a constant called "interest"
    const total_interests = (amounts * (interest_rates * 0.01)) * month;
    
    //The bottom line calculates how much to pay each month.
    //Here the total amount is divided by the month (which you will input) and the monthly interest is added to it.
    //All these calculations are stored in a constant called "payment".     
    let monthinterest = (total_interests / month).toFixed(2); 
    let total_amount = (parseFloat(total_interests) + parseFloat(amounts));

    //regedit to add a comma after every three digits
    //That is, a comma (,) will be added after every three numbers.
    //Example 50,000
    monthinterest = monthinterest.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
    
    //With the help of innerHTML, the information stored in the "payment" is displayed on the webpage.
    document.querySelector('#payments').innerHTML = `Monthly Interest = RM ${monthinterest}`
    document.querySelector('#paymentss').innerHTML = `You will get RM ${total_amount} after ${month} month`
    }
    