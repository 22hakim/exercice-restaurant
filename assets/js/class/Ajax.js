export default class Ajax {
    
    requestJson(url){
        
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
        
       fetch(url, { method: 'POST', body: formData })
        .then(response => response.text())
        .then(res => document.querySelector('#info').innerHTML = res)
        
    }
    
    
    displayDishJson(content){
        
        console.log(content)
        
    }
    
    displayDishHtml(content){
        
        document.querySelector('.myresult').innerHTML = content
    
    }
    
}
