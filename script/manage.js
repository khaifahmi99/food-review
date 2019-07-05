db.enablePersistence()
    .catch((e) => {
        if (e.code == 'failed-precondition') {
            console.log('Persistence failed');
        } else if (e.code == 'unimplemented') {
            console.log('browser not supporting');
        }
    })


const addForm = document.querySelector('#add-form');

if (addForm !== null) {
    addForm.addEventListener('submit', (e) => {
        console.log('form submitted');
        e.preventDefault();

        const data = {
            'name': addForm.name.value,
            'restaurant': addForm.restaurant.value,
            'currency': addForm.currency.value,
            'price': addForm.price.value,
            'exactPrice': addForm.exactPrice.value,
            'location': addForm.location.value,
            'stars': addForm.stars.value,
            'comments': addForm.comments.value
        };

        db.collection('reviews').add(data)
            .catch((e) => {
                console.log(e);
            })

        addForm.name.value = '';
        addForm.restaurant.value = '';
        addForm.currency.value = '';
        addForm.price.value = '';
        addForm.exactPrice.value = '';
        addForm.location.value = '';
        addForm.stars.value = '';
        addForm.comments.value = '';

    });
}