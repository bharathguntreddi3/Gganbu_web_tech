// assign  panels to the selectot panel
const panels = document.querySelectorAll('.panel')

// making a clickable panel cards
panels.forEach(panel => {
    panel.addEventListener('click', () => {
        removeActiveClasses()
        panel.classList.add('active')
    })
})

// on new card click change the active panel card
function removeActiveClasses() {
    panels.forEach(panel => {
        panel.classList.remove('active')
    })
}



