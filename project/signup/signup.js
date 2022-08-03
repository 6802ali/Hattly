const form = document.getElementById('form');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const country = document.getElementById('country');
const city = document.getElementById('city');
const street = document.getElementById('street');
const phone = document.getElementById('phone');
const age = document.getElementById('age');
var flag = true;

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
const isvalidfname = fname => {
    const fn = /^[A-Za-z]{3,22}$/;
    return fn.test(String(fname));
}
const isvalidlname = lname =>{
    const ln = /^[A-Za-z]{3,22}$/;
    return ln.test(String(lname).toLowerCase());
}
const isValidEmail = email => {
    const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(String(email).toLowerCase());
}

const isvalidcountry = country =>{
    const co = /^[A-Za-z][A-Za-z0-9_]{3,29}$/;
    return co.test(String(country).toLowerCase());
}

const isvalidcity = city =>{
    const ci = /^[\w\s-]{3,29}$/;
    return ci.test(String(city).toLowerCase());;
}

const isvalidstreet = street =>{
    const st = /^[\w\s-]{3,29}$/;
    return st.test(String(street).toLowerCase());
}

const isValidphone = phone =>{
    const p = /^01[0125][0-9]{8}$/;
    return p.test(phone);
}

const isValidage = age =>{
    const a =/^(1[89]|[2-9]\d)$/;
    return a.test(age);
}
const validateInputs = () => {
    const fnameValue = fname.value.trim();
    const lnameValue = lname.value.trim();
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const countryvalue = country.value.trim();
    const cityvalue = city.value.trim();
    const streetvalue = street.value.trim();
    const phonevalue = phone.value.trim();
    const agevalue = age.value.trim();

    if(fnameValue === ''){
        setError(fname,'first name is required');
        flag = false;
    }else if(!isvalidfname(fnameValue)){
        setError(fname,'provide a valid first name');
        flag = false;
    }else{
        setSuccess(fname);
    }
    if(lnameValue === ''){
        setError(lname,'first name is required');
        flag = false;
    }else if(!isvalidlname(lnameValue)){
        setError(lname,'provide a valid first name');
        flag = false;
    }else{
        setSuccess(lname);
    }

    if(usernameValue === '') {
        setError(username, 'Username is required');
        flag = false;
    } else {
        setSuccess(username);
    }

    if(emailValue === '') {
        setError(email, 'Email is required');
        flag = false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        flag = false;
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
        flag = false;
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.');
        flag = false;
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
        flag = false;
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
        flag = false;
    } else {
        setSuccess(password2);
    }

    if(countryvalue === ''){
        setError(country,'please confirm your country');
        flag = false;
    }else if(!isvalidcountry(countryvalue)){
        setError(country,'provide a valid country');
        flag = false;
    }else{
        setSuccess(country);
    }

    if(cityvalue === ''){
        setError(city,'please confirm your city');
        flag = false;
    }else if(!isvalidcity(cityvalue)){
        setError(city,'provide a valid city');
        flag = false;
    }else{
        setSuccess(city);
    }

    if(streetvalue === ''){
        setError(street,'please confirm your street');
        flag = false;
    }else if(!isvalidstreet(streetvalue)){
        setError(street,'provide a valid street');
        flag = false;
    }else{
        setSuccess(street);
    }

    if(phonevalue === ''){
        setError(phone,'please enter your phone number');
        flag = false;
    }else if(!isValidphone(phonevalue)){
        setError(phone,'provide a valid phone number');
        flag = false;
    }else{
        setSuccess(phone);
    }

    if(agevalue === ''){
        setError(age,'please confirm your age');
        flag = false;
    }else if(!isValidage(agevalue)){
        setError(age,'provide a valid age');
        flag = false;
    }else{
        setSuccess(age);
    }
    
}
if(flag == true)
        return true;
    else
        return false;
