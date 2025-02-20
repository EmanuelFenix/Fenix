let forUse2 = document.querySelector('.for_use2')
let lab = document.querySelector('.lab')

const most2 = (e) => {
    const inputTarget2 = e.target
    console.log(e)
    const file2 = inputTarget2.files[0]

    const reader2 = new FileReader()

    reader2.addEventListener('load', function (e) {
        file2.innerHTML = ''
        //dv.innerHTML = ''
        const readerTarget2 = e.target
        //dv.appendChild(img)

        forUse2.value = `${readerTarget2.result}`
        lab.innerHTML = 'Seleção feita com Sucesso!'
        lab.style.color = '#ffd700'
        alter.style.display = 'flex'
        lab.src = `${readerTarget2.result}`
        alter.value = 'Alterar'
    })

    reader2.readAsDataURL(file2)

}

const alter = document.querySelector('.alter')
const file2 = document.querySelector('#postFoto')
file2.addEventListener('change', most2)






let forUse22 = document.querySelector('.for_use22')
let lab2 = document.querySelector('.lab2')

const most22 = (e) => {
    const inputTarget22 = e.target
    console.log(e)
    const file22 = inputTarget22.files[0]

    const reader22 = new FileReader()

    reader22.addEventListener('load', function (e) {
        file22.innerHTML = ''
        //dv.innerHTML = ''
        const readerTarget22 = e.target
        //dv.appendChild(img)

        forUse22.value = `${readerTarget22.result}`
        lab2.innerHTML = 'Seleção feita com Sucesso!'
        lab2.style.backgroundImage = `url('${readerTarget22.result}')`
        lab2.style.color = '#ffd700'
        lab2.style.textShadow = '0 0 10px #000000'
    })

    reader22.readAsDataURL(file22)

}

const file22 = document.querySelector('#postFoto2')
file22.addEventListener('change', most22)

let enter = 0
last = ''
const postText2 = document.querySelector('#postText2')
const postText3 = document.querySelector('#postText3')
const postTextTITULO2 = document.querySelector('#postTextTITULO2')
postText2.addEventListener('keydown', (key) => {
    let k = key.key
    if (k == 'Enter') {
        enter++
        if (enter >= 2) {
            txt = '------'
            postText2.value += `${txt}`
        }
    } else {
        enter = 0
    }
})

postText3.addEventListener('keydown', (key) => {
    let k = key.key
    if (k == 'Enter') {
        enter++
        if (enter >= 2) {
            txt = '------'
            postText3.value += `${txt}`
        }
    } else {
        enter = 0
    }
})

postTextTITULO2.addEventListener('keydown', (key) => {
    let k = key.key
    if (k == 'Enter') {
        enter++
        if (enter >= 2) {
            txt = '------'
            postTextTITULO2.value += `${txt}`
        }
    } else {
        enter = 0
    }
})

