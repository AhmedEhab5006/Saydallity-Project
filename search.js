function search(){
    let searchbar = document.getElementById('search').value.toLocaleUpperCase();
    let productList = document.querySelector('.itemContainer');
    let product = document.querySelectorAll('.item');
    let productName = getElementsByTagName('h2');

    for (let i = 0 ; i<productName.length ; i++) {
        if (productName[i].innerHTML.toLocaleUpperCase().indexOf(searchbar) >= 0){
            product[i].style.display = "";
        } else {
            product[i].style.display = "none";
        }
    }
}