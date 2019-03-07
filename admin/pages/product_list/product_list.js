const table = document.getElementById('table-container')
const options = {
  valueNames: ['id','name', 'born','unit_cost','quantity','category'],
}

// var userList = new List('users', options)

/**
 * Fetch Products
 */
async function fetchProducts() {
  const response = await axios.get('/app/api/products/read.php');
  return ({ data } = response.data.data)
}

/**
 * LoadTable
 */
async function loadTable() {
  try{
    const response = await fetchProducts()
    console.log(response)
    table.innerHTML = '';
    response.forEach( ({id, name, category, unit_cost, rating, supplier}) => {
      table.innerHTML += `<tr>
        <td class="id">${id}</td>
        <td class="name">${name}</td>
        <td class="category">${category || 'No Category'}</td>
        <td class="unit_cost">P ${unit_cost}</td>
        <td class="rating">${rating}</td>
        <td class="supplier">${supplier}</td>
        <td class="action"><a href="?mod=product&id=${id}">View</a></td>
      </tr>`
    })
    return new List('product-table', options)
  }catch(e){
    
  } 
}

function main() {
  loadTable()
}
main()
