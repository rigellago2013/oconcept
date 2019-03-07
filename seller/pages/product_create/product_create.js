const URL_ID = new URLSearchParams(window.location.search);
const imgInput = document.getElementById('image');
const base64Image =  getBase64(imgInput.files[0]);
const createBtn = document.getElementById('createBtn');

const nameInput = document.getElementById('name');
const typeInput = document.getElementById('category_id');
const costInput = document.getElementById('cost');
const reorderInput = document.getElementById('reordering_point');
const qtyInput = document.getElementById('quantity');
const descInput = document.getElementById('description');


async function productAdd(){

const base64Image = await getBase64(imgInput.files[0])
const create =(user_id,image,name,category_id,cost,reordering_point,quantity,description)=>{  
  
    const payload = {

        user_id: localStorage.getItem('id'),
        image:base64Image,
        name:name,
        reordering_point:reordering_point,
        cost:cost,
        category_id:category_id,
        quantity:quantity,
        description:description
        
       
    }


      const config = {
      headers: {
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Access - Control - Allow - Methods': 'POST',
      }
    }

    return axios.post(`${env.url}/app/api/products/create.php`, JSON.stringify(payload))
  }

  try {

    createBtn.style.display = 'none';
    loader.style.display = 'block';
   
    const user_id = localStorage.getItem('id');
    const image = imgInput.value || '';
    const name = nameInput.value || '';
    const category_id = typeInput.value || '';
    const cost = costInput.value || '';
    const reordering_point = reorderInput.value || '';
    const quantity = qtyInput.value || '';
    const description = descInput.value || '';
   
   


     const isSuccess = await create(user_id,image,name,category_id,cost,reordering_point,quantity,description);

     if (isSuccess) {

      console.log('[Register]', 'success');
      
      // localStorage.setItem('image', image);
      // localStorage.setItem('name', name);
      // localStorage.setItem('category_id',category_id);
      // localStorage.setItem('cost',cost);
      // localStorage.setItem('reordering_point',reordering_point);
      // localStorage.setItem('quantity',quantity);
      // localStorage.setItem('description',description);

      alert('Successfully Added');
      window.location = 'index.php';
    } else {
      throw Error('Unable to Register');
    
    }

  }


  catch (e) {
    console.error('[Create Button]', e);
    createBtn.style.display = 'block';
   
  }

}


function getBase64(file) {
   return new Promise((resolve, reject) => {
    const reader = new FileReader()
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result)
    reader.onerror = error => reject(error)
  })
}



async function imageListener() {
  const imgInput = document.getElementById('image').addEventListener('change', async e => {
    try {
      const { files } = e.srcElement
      const base64Img = await getBase64(files[0])
      document.getElementById('#img-upload').src = base64Img
    } catch (e) {}
  })
}


function main() {
  // imageListener();
  createBtn.onclick = productAdd;
}
main()
