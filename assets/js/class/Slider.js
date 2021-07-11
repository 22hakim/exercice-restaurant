export default class Slider{
  
  constructor(){
      
      this.play();
      
  }
  
  play(){
    
    const slider = document.querySelector('.slider div');
    const slides = [
                      { src :'assets/img/slider-01.jpg', alt:'Table seen from the top with drinks and plates with food' },
                      { src :'assets/img/slider-02.jpg', alt:'Zoom on a plate seen from the top and red chilli' },
                      { src :'assets/img/slider-03.jpg', alt:'Table seen from the top with drinks and plates with food' },
                    ];
                    
    let index = 0

    setInterval(() => {
      
      (index >= slides.length-1) ? index = 0 : index++;
      
      slider.innerHTML = ''
      slider.insertAdjacentHTML(`afterbegin`,`<img src="${slides[index].src}" alt="${slides[index].alt}">`
      
      )
    }, 2000,slider,slides);
    
    

  }
}