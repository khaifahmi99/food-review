document.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelectorAll('.sidenav-menu');
    M.Sidenav.init(menu, {edge: 'right'});

    const select = document.querySelectorAll('select');
    M.FormSelect.init(select);
});

const reviews = document.querySelector('#reviews');

renderReview = (data, id) => {
    const template = `
        <div class="card-panel review blue lighten-2" data-id=${id}>
            <h4 class="name">${data.name}</h4>
            <h5 class="rating">${data.stars}/5</h5>
            <div class="row">
                <div class="col s6">
                    <p class="price ">${data.price} ${data.currency}</p>
                </div>
                <div class="col s6 right-align">
                    <p class="location">${data.location}</p>
                </div>
            </div>
        </div>
    `;

    reviews.innerHTML += template;
}