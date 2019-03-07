
const  descriptionInput = document.getElementById('description');
const descriptionBtn = document.getElementById('descriptionBtn');
const loader = document.getElementById('loader');


async function description(){

   // const  id = localStorage.getItem('id');

    const create = (user_id,description) =>{

          const payload = {
              user_id:user_id,
              description:description
          }

           return axios.post(`${env.url}/app/api/bidding/postbid.php`, JSON.stringify(payload))
         
      }

      try{

          descriptionBtn.display = 'none';
          loader.style.display = 'block';

          const description = descriptionInput.value || '';
          const  user_id = localStorage.getItem('id');

          const isSuccess = await create(user_id,description);

          if(isSuccess) {

            console.log('[Save Description]', 'success');

            localStorage.setItem('id',user_id);
            localStorage.setItem('description',description);

            alert('Successfully Added a Description');
            window.location = 'index.php?mod=bidding';

          } else{
              console.error('Unable To Add a Description',e);
              descriptionBtn.style.display = 'block'
              loader.style.display='none';
          }

      }

    catch (e) {
    console.error('[Save Description]', e);
    descriptionBtn.style.display = 'block';
    loader.style.display = 'none';
  }

} 

function main() {
    userValidator();
    descriptionBtn.onclick = description ;
}
  

main();


