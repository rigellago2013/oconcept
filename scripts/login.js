const loginBtn = document.getElementById('loginBtn')
const emailInput = document.getElementById('email')
const passwordInput = document.getElementById('password')

const loader = document.getElementById('loader')
/**
 * login user
 */
async function login() {
  const authenticate = (email, password) => {
    const payload = {
      email: email,
      password: password,
    }
    const config = {
      headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access - Control - Allow - Methods': 'POST',
      },
    }
    return axios.post(`${env.url}/app/api/user/login.php`, JSON.stringify(payload))
  }

  try {
    loginBtn.style.display = 'none'
    loader.style.display = 'block'

    const emailValue = emailInput.value || ''
    const passwordValue = passwordInput.value || ''

    if (emailValue === '' || passwordValue === '') {
      alert('NO PASSWORD? or EMAIL!?')
      throw Error('email or password is invalid')
    }



    const response = await authenticate(emailValue, passwordValue)
    const { message } = response.data
    const { email, name, user_type, user_id} = response.data.data
    console.log(response.data.data)
    if (message === 'success') {

      console.log('[Login]', 'success')
      localStorage.setItem('email', email)
      localStorage.setItem('name', name)
      localStorage.setItem('type', user_type)
      localStorage.setItem('id', user_id)

      if(user_type.toLowerCase() === 'admin'){
        window.location = '/admin/index.php';
      } else if (user_type.toLowerCase() === 'seller') {
        window.location = '/seller/index.php';
      } else if(user_type.toLowerCase() === 'customer') {
        window.location = '/customer/index.php';
      }
    } else {
      
      alert('Invalid Password');
      throw Error('Unable to Login');
   
    }
  } catch (e) {

    loginBtn.style.display = 'block'
    loader.style.display = 'none'
  }
}

function main() {
  localStorage.clear()
  loginBtn.onclick = login
}
main()
