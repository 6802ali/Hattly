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
const submit = document.getElementById('submit'); submit.disabled = true; 
var flag = true;

const checkval = () => {
  var noError = true;
  form.querySelectorAll(".input-control").forEach(input => {
    if (!input.classList.contains('success')) {noError = false;}
  });
  flag = noError;
  console.log(flag);
  if (flag) {
    submit.disabled = false;
  } else {
    submit.disabled = true;
  }
}
const setError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');

  errorDisplay.innerText = message;
  inputControl.classList.add('error');
  inputControl.classList.remove('success');
  checkval();
}
const setSuccess = element => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');

  errorDisplay.innerText = '';
  inputControl.classList.add('success');
  inputControl.classList.remove('error');
  checkval();
}
fname.oninput = () => {
  const regex = /^[A-Za-z]{3,22}$/;
  console.log(fname.value + ' : ' + regex.test(String(fname.value)));
  
  if (regex.test(String(fname.value))) {
    setSuccess(fname);
  } else {
    setError(fname, 'Invalid first name (capital or small letters {3-22 characters})');
  }
}
lname.oninput = () => {
  const regex = /^[A-Za-z]{3,22}$/;
  console.log(lname.value + ' : ' + regex.test(String(lname.value)));
  
  if (regex.test(String(lname.value))) {
    setSuccess(lname);
  } else {
    setError(lname, 'Invalid last name (capital or small letters {3-22 characters})');
  }
}
username.oninput = () => {
  const regex = /^[a-zA-Z0-9_]{8,22}$/;
  console.log(username.value + ' : ' + regex.test(String(username.value)));
  
  if (regex.test(String(username.value))) {
    setSuccess(username);
  } else {
    setError(username, 'Invalid username (capital or small letters or numbers or _ {8-22 characters})');
  }
}
email.oninput = () => {
  const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  console.log(email.value + ' : ' + regex.test(String(email.value)));
  
  if (regex.test(String(email.value))) {
    setSuccess(email);
  } else {
    setError(email, 'Invalid email');
  }
}
password.oninput = () => {
  const regex = /^[A-Za-z][A-Za-z0-9_]{8,22}$/;
  console.log(password.value + ' : ' + regex.test(String(password.value)));
  
  if (regex.test(String(password.value))) {
    setSuccess(password);
  } else {
    setError(password, 'Invalid password (capital or small letters or numbers or _ {8-22 characters})');
  }
}
password2.oninput = () => {
  console.log(password2.value + ' : ' + password2.value === password.value);
  
  if (password2.value === password.value) {
    setSuccess(password2);
  } else {
    setError(password2, 'Passwords do not match');
  }
}
country.oninput = () => {
  const regex = /^[A-Za-z][A-Za-z0-9_]{3,29}$/;
  console.log(country.value + ' : ' + regex.test(String(country.value)));
  
  if (regex.test(String(country.value))) {
    setSuccess(country);
  } else {
    setError(country, 'Must start with a letter or capital or small letters or numbers or _ {3-29 characters})');
  }
}
city.oninput = () => {
  const regex = /^[\w\s-]{3,29}$/;
  console.log(city.value + ' : ' + regex.test(String(city.value)));
  
  if (regex.test(String(city.value))) {
    setSuccess(city);
  } else {
    setError(city, 'Invalid city name (capital or small letter or numbers or _ or spaces {3-29 characters})');
  }
}
street.oninput = () => {
  const regex = /^[\w\s-]{3,50}$/;
  console.log(street.value + ' : ' + regex.test(String(street.value)));
  
  if (regex.test(String(street.value))) {
    setSuccess(street);
  } else {
    setError(street, 'Invalid street name (capital or small letter or numbers or _ or spaces {3-50 characters})');
  }
}
phone.oninput = () => {
  const regex = /^01[0125][0-9]{8}$/;
  console.log(phone.value + ' : ' + regex.test(String(phone.value)));
  
  if (regex.test(String(phone.value))) {
    setSuccess(phone);
  } else {
    setError(phone, 'Invalid phone number {11 numbers}');
  }
}
age.oninput = () => {
  const regex = /^(1[89]|[2-9]\d)$/;
  console.log(age.value + ' : ' + regex.test(String(age.value)));
  
  if (regex.test(String(age.value))) {
    setSuccess(age);
  } else {
    setError(age, 'Invalid age (from 18 to 99)');
  }
}
