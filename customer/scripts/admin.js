/**
 * isAuthenticated
 * @description Check if User has logged in. If Not page will redirect to login page.
 */
function userValidator() {
  try {
    const email = localStorage.getItem('email') || ''
    const id = localStorage.getItem('id') || ''
    const name = localStorage.getItem('name') || ''
    const type = localStorage.getItem('type') || ''
    if (email === '' || id === '' || name === '' || type === '') {
      throw Error('Not Authenticated')
    }
  } catch (e) {
    console.error(e)
    window.location = '/login.php'
  }
}

/**
 * main
 * @description Calls at the start of the page load.
 */
function main() { }

main()
