const URL_ID = new URLSearchParams(window.location.search);
const commentInput = document.getElementById('comment');
const bidIdInput = document.getElementById('bid_id');
const postBtn = document.getElementById('postBtn');



async function commentAdd(){
	const create = (user_id,bid_id,amount_id)=>{
		const payload = {
			user_id:user_id,
			bid_id:bid_id,
			amount_id:amount_id
		}

	const config = {
      headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access - Control - Allow - Methods': 'POST',
      }
    }

	return axios.post(`${env.url}/app/api/bidding/postcomment.php`, JSON.stringify(payload))

	}



}