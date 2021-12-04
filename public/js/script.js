function validate_amount(x, y) {


    $.ajaxSetup({

        headers: {
            "X_CSRF_TOKEN": $('meta[name="csrf_token"]').attr('content')
        }


    });

    $.ajax({


        url: "/products/valid",
        method: "post",
        data: {
            'qty': x,
            'id': y
        },
        async: false




    }).done(z => {



        let m1 = JSON.parse(z);
        if (m1.success == true) {

            let m = document.createElement('div');
            let h3 = document.createElement('h3');
            h3.appendChild(document.createTextNode(m1.message));
            m.className = "alert alert-success ";

            m.appendChild(h3)
            document.querySelector('.error').appendChild(m);
            document.querySelector('#qt').value = 1;
            setTimeout(() => {
                m.remove();
            }, 3000);
        }
    });


}