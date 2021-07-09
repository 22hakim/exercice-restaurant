// la bonne méthode est qu'un fichier = une classe. comment utilisez les modules 
export default class Ajax {
    
    // me demande une url et une fonction callback
    requestJson(url){
        //console.log(url)
        fetch(url)
        .then(res => res.json())
        .then(this.displayDishJson)
        
    }
    
    requestHtml(url){
        
       fetch(url)
       .then(res => res.text())
       .then(this.displayDishHtml)
        
    }
    
    requestPost(url, formData){
        
        // console.log(url,formData)
        
       fetch(url, { method: 'POST', body: formData })
        .then(response => response.text())
        .then(res => document.querySelector('#info').innerHTML = res)
        
    }
    
    
    displayDishJson(content){
        
        console.log(content)
        
        
    }
    
    displayDishHtml(content){
        
        // console.log(content)
        document.querySelector('.myresult').innerHTML = content
        
        
    }
    
}
