const URL_ID = new URLSearchParams(window.location.search)
const container = document.getElementById('productContainer')
const form = document.querySelector('#form')

/**
 * previewfile
 * @description - fetch image for decoding to base64
 */
function previewFile() {
  var preview = document.querySelector('img')
  var file = document.querySelector('input[type=file]').files[0]
  var reader = new FileReader()

  reader.onloadend = function() {
    preview.src = reader.result
  }

  if (file) {
    reader.readAsDataURL(file)
  } else {
    preview.src = ''
  }
}

/**
 * getBase64
 * @description Get Image File and Convert to Base 64
 * @param {File} file
 * @returns {String}
 */
function getBase64(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader()
    reader.readAsDataURL(file)
    reader.onload = () => resolve(reader.result)
    reader.onerror = error => reject(error)
  })
}

async function formListener() {
  form.addEventListener('submit', async function(e) {
    e.preventDefault() //stop form from submitting
    const imgInput = form.querySelector('#image')
    const nameInput = form.querySelector('#name')
    const typeInput = form.querySelector('#type')
    const costInput = form.querySelector('#cost')
    const reorderInput = form.querySelector('#reorder')
    const qtyInput = form.querySelector('#quantity')
    const descInput = form.querySelector('#description')
    const base64Image = await getBase64(imgInput.files[0])
    const result = {
      image: base64Image,
      name: nameInput.value,
      type: typeInput.value,
      cost: costInput.value,
      quantity: qtyInput.value,
      reordering_point: reorderInput.value,
      description: descInput.value || '',
    }
    console.log(form)
  })
}

async function imageListener() {
  const image = form.querySelector('#image').addEventListener('change', async e => {
    try {
      const { files } = e.srcElement
      const base64Img = await getBase64(files[0])
      form.querySelector('#imgContainer').src = base64Img
    } catch (e) {}
  })
}

function main() {
  userValidator()
  imageListener()
  formListener()
}
main()
