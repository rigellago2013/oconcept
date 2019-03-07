const registerBtn = document.getElementById('registerBtn');
const nameInput = document.getElementById('name');
const passwordInput = document.getElementById('password');
const emailInput = document.getElementById('email');
const contactInput = document.getElementById('contact');
const addressInput = document.getElementById('address');
const roleInput = document.getElementById('type');
const loader = document.getElementById('loader');

async function register(){
const create = (name,password,email,contact,address,type) => {

  const payload = {
    name:name,
    password:password,
    email:email,
    contact:contact,
    address:address,
    type:type

  }

  const config = {
      headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access - Control - Allow - Methods': 'POST',
      }
    }

    return axios.post(`${env.url}/app/api/user/register.php `, JSON.stringify(payload)) 



  }

  try {

    registerBtn.style.display = 'none';
    loader.style.display = 'block';

    const name = nameInput.value || '';
    const password = passwordInput.value || '';
    const email = emailInput.value || '';
    const contact = contactInput.value || '';
    const address = addressInput.value || '';
    const type = roleInput.value || '';

    if(name==='' || password==='' || email==='' || contact==='' || address==='' || type===''){
        alert('DONT LEAVE THE FORM BLANK')
        throw Errror(`Form Invalids`)
    }


    const isSuccess = await create(name,password,email,contact,address,type);

    if (isSuccess) {

      console.log('[Register]', 'success');

      localStorage.setItem('name', name);
      localStorage.setItem('password', password);
      localStorage.setItem('email',email);
      localStorage.setItem('contact',contact);
      localStorage.setItem('address',address);

      alert('Successfully Registered');
      window.location = 'login.php';
    } else {
      throw Error('Unable to Register');
    
    }
  }
  
  catch (e) {
    console.error('[Register]', e);
    registerBtn.style.display = 'block';
    loader.style.display = 'none';
  }

}


function main() {
  registerBtn.onclick = register;
}
main();

