window.onload = function(){

    const selectModele = document.getElementById("modeleSelect");

    const redirectModele = () => {   
        location.href=document.getElementById("modeleSelect").value;
    }
    
    selectModele.addEventListener('change', redirectModele)
  
    const selectCategorie = document.getElementById("categorieSelect");

    const redirectCategorie = () => {   
        location.href=document.getElementById("categorieSelect").value;
    }
    
    selectCategorie.addEventListener('change', redirectCategorie)

    const selectType = document.getElementById("typeSelect");

    const redirectType = () => {   
        location.href=document.getElementById("typeSelect").value;
    }
    
    selectType.addEventListener('change', redirectType)

    const selectCarburant = document.getElementById("carburantSelect");

    const redirectCarburant = () => {   
        location.href=document.getElementById("carburantSelect").value;
    }
    
    selectCarburant.addEventListener('change', redirectCarburant)
}