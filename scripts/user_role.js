const user_type = document.getElementById('user_type');

const getUserRole = () =>{
	const config = {
      headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access - Control - Allow - Methods': 'POST',
      }
    }
        return axios.get(`${env.url}/app/api/user/gettypes.php `, JSON.stringify(payload));
        console.log(data);

}
