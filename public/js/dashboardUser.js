
const dropdown = document.querySelector('.dropdown__menu');
const subMenu = document.querySelector('.sub-menu');
const dropdownIcon = document.querySelector('.dropdown__menu i:nth-child(2)');

dropdown.addEventListener('click', () => {
    subMenu.classList.toggle('show-sub__menu');
    dropdownIcon.classList.toggle('rotate_dropdown');
});


// Side Bar
const burger  = document.querySelector('.floating');
const xBurger  = document.querySelector('.floating i');
const nav = document.querySelector('.side-bar');

burger.addEventListener('click', () => {
    xBurger.classList.toggle('bx-x');
    nav.classList.toggle('show-nav');
});


    // preview Image KTP
    const photoKtp = document.getElementById('input-ktp');
    const imagePreview = document.getElementById('image-preview');
    let imageResult = document.querySelector('.image-preview__image')
    const textPreview = imagePreview.querySelector('.image-preview__text');

    photoKtp.addEventListener('change', function() {
        
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            textPreview.style.display = 'none';
            imageResult.style.display = 'block';
            imagePreview.style.border = '0'
            reader.addEventListener('load', function() {
                imageResult.setAttribute('src', this.result);
            });

            reader.readAsDataURL(file);
        } else {
            textPreview.style.display = null;
            imageResult.style.display = null;
            imagePreview.style.border = '2px solid #dddddd'

            imageResult.setAttribute('src', '')
        }
    });

    // preview Image Kartu Keluarga
const photoKk = document.getElementById('input-kk');
    const imagePreviewKk = document.getElementById('image-previewKk');
    let imageResultKk = document.querySelector('.image-previewKk__image')
    const textPreviewKk = imagePreviewKk.querySelector('.image-previewKk__text');

    photoKk.addEventListener('change', function() {
        
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            textPreviewKk.style.display = 'none';
            imageResultKk.style.display = 'block';
            imagePreviewKk.style.border = '0'
            reader.addEventListener('load', function() {
                imageResultKk.setAttribute('src', this.result);
            });

            reader.readAsDataURL(file);
        } else {
            textPreviewKk.style.display = null;
            imageResultKk.style.display = null;
            imagePreviewKk.style.border = '2px solid #dddddd'

            imageResultKk.setAttribute('src', '')
        }
    });
