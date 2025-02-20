const as = document.querySelectorAll('.a')
as.forEach((a) => {
    a.addEventListener('mouseout', () => {
        a.classList.add('aOut')
        setTimeout(() => {
            a.classList.remove('aOut')
        }, 250)
    })
})

const btLIKEs = document.querySelectorAll('.like')
btLIKEs.forEach((btLIKE) => {
    btLIKE.addEventListener('click', () => {
        btLIKE.computedStyleMap.display = 'none'
    })
})