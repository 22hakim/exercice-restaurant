/** Définition des vars **/
const $play       = document.querySelector('#play-pause')
const $prev       = document.querySelector('#prev')
const $next       = document.querySelector('#next')
const $sliders    = document.querySelectorAll('.slider-figure')

// Constantes de touches + delay
const ARROW_RIGHT = "ArrowRight"
const ARROW_LEFT  = "ArrowLeft"

const DELAY = 2000

const mySlider = {
  index: 0,
  timer: null
}

/** Définition des functions **/
function previous() {

  mySlider.index--

  if (mySlider.index < 0) 
    mySlider.index = $sliders.length-1
  
  refresh()
}

function next() {

  mySlider.index++

  if (mySlider.index > $sliders.length-1) 
    mySlider.index = 0
  
  refresh()
}

function play() {

  const icon = document.querySelector('#play-pause i')
  icon.classList.toggle('fa-play')
  icon.classList.toggle('fa-pause')
  
  // Test if start or stop
  if (mySlider.timer == null) {
    console.log('1')
    // Start
    mySlider.timer = setInterval(next, DELAY)
  } else {
    // Stop
    console.log('2')
    clearInterval(mySlider.timer)
    mySlider.timer = null
  }
}

// Nécessite un paramètre event pour récupérer la touche appuyée
function keyboard(event) {
  switch (event.key) {
    case ARROW_LEFT:
      previous()
      break;
    case ARROW_RIGHT:
      next()
      break;
  }
}

function refresh() {
  // On supprime la classe de l'élément précédemment affiché
  const oldActive = document.querySelector('.active')
  oldActive.classList.remove('active')
  
  // Affichage de la nouvelle image
  $sliders[mySlider.index].classList.add('active')
}

/** Programme **/
document.addEventListener('DOMContentLoaded', function () {

  document.addEventListener('click',(event) => {

    if(event.target.matches('#play-pause') || event.target.matches('i.fas.fa-play'))
      play();
    else if(event.target.matches('#next') || event.target.matches('i.fas.fa-chevron-right')) 
      next();
    else if(event.target.matches('#prev') || event.target.matches('i.fas.fa-chevron-left')) 
      previous();
  })
    
  document.addEventListener('keydown', function(event){
    
      if($sliders){
        keyboard(event);

      }
  })

})
