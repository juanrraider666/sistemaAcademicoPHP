
document.addEventListener('DOMContentLoaded', () =>{
    const cookies = document.cookie.split(';');
    let cookie = null;
    cookies.forEach(item =>{
        if(item.indexOf('items') > -1){
            cookie = item;
        }
    });
    if(cookie != null){
        const count = cookie.split('=')[1];
        console.log(count);
        document.querySelector('.btn-carrito').innerHTML = `(${count}) Carrito`;
    }
})

const bCarrito = document.querySelector('.btn-carrito');

bCarrito.addEventListener('click', (e) =>{
    e.preventDefault();
    const carritoContainer = document.querySelector('#carrito-container');

    if(carritoContainer.style.display == ''){
        carritoContainer.style.display = 'block';

        actualizarCarritoUI();
    }else{
        carritoContainer.style.display = '';
    }

});

function actualizarCarritoUI(){

    fetch('http://localhost/laUltimaYnosVamosPHP/pages/cart.php?action=mostrar',{
        method:'POST',

    })
        .then(response =>{
            return response.json();
        })
        .then(data =>{
            console.log(data);
            let tablaCont = document.querySelector('#tabla');
            let precioTotal = '';
            let html = ``;
            let $i = 0;
            data.items.forEach(element => {

                html += `
                <div class='fila'>
                    <div class='imagen'><img src='../images/${element[$i].file}' width='100' /></div>
                    <div class='info'>
                        <input type='hidden' value='${element[$i].id}' />
                        <div class='nombre'>${element[$i].name}</div>
                        <div>${element['cantidad']} items de $${element[$i].price}</div>
                        <div>Subtotal: ${element['subtotal']}</div>
                        <div class='botones'><button class='btn-remove'>Quitar ${data.info.count} del carrito</button></div>
                    </div>
                </div>
            `;
                $i++;
            });


            precioTotal = `<p>Total: $${data.info.total}</p>`;
            tablaCont.innerHTML = precioTotal + html;
            document.cookie = `items=${data.info.count}`;
            document.querySelector('.btn-carrito').innerHTML = `(${data.info.count}) Carrito`;

            document.querySelectorAll('.btn-remove').forEach(boton =>{
                boton.addEventListener('click', () => {
                    const id = boton.parentElement.parentElement.children[0].value;
                    removeItemFromCarrito(id);
                })
            });
        }).catch((error) => console.log(error));
}

const botones = document.querySelectorAll('botones');



function addCartFunction(e){
    addItemToCart($(e).val());
}


botones.forEach(boton => {
    const id = boton.parentElement.parentElement.children[0].value;

    console.log(id)
    boton.addEventListener('click', e =>{
        addItemToCart(id);
    });
});

const addItemToCart = id =>{
    fetch('http://localhost/laUltimaYnosVamosPHP/pages/cart.php?action=add&id=' + id)
        .then(response =>{
            return response.text();
        })
        .then(data =>{
            actualizarCarritoUI();
        });
};

const removeItemFromCarrito = id =>{
    fetch('http://localhost/laUltimaYnosVamosPHP/pages/cart.php?action=remove&id=' + id)
        .then(res =>{
            return res.json();
        })
        .then(data =>{
            console.log(data.statuscode);
            actualizarCarritoUI();
        });
};