$(function () {
	//e.preventDefault();
	//e.stopPropagation();


	$('[data-id="open-nav"]').on('click',function(){
		$('body').addClass('openNav');
	});

	$('[data-id="close-nav"],[data-id="overlay"]').on('click',function(){
		$('body').removeClass('openNav');
	});

    $('[data-js="refresh-captcha"]').on('click',function(){
        let button = $(this);
        let url = $(this).data('js-url');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            dataType: "JSON",
            beforeSend : function() {
                button.attr('disabled', true);
            },
            success: function (res) {
                button.closest('.captcha').find('img').attr('src', res);
            },
            complete: function () {
                button.attr('disabled', false);
            },
            error: function(res) {
                console.log(res);
            }
        });
    });

    const form = document.querySelector('form');

    // form.addEventListener('submit', function(event) {
        // event.preventDefault();
        //
        // const url = form.action;
        // const formData = new FormData(form);
        //
        // submitFormData(url, formData)
        //     .then(function(response) {
        //         console.log(response);
        //         if (response.errors.length === 0) {
        //             alert('Success!');
        //         } else {
        //             let errorMessage = [];
        //             let errors = response.errors;
        //             console.log(response.errors);
        //             Object.keys(errors).forEach((key) => {
        //                 errorMessage.push(errors[key].join('\n'));
        //             });
        //
        //             alert(`Fail!\n${errorMessage.join('\n')}`);
        //         }
        //     })
        //     .catch(function(error) {
        //
        //         console.log(error);
        //     });

        // let result = [];
        //
        // let result1 = validation($(this));
        // if (result1.length > 0) {
        //     result = result.concat(result1);
        // }
        //
        // let result2 = validationFile();
        // if (result2.length > 0) {
        //     result = result.concat(result2);
        // }
        //
        // let message = [];
        //
        // result.forEach((item) => {
        //     if (item.status === false) {
        //         message.push(item.message.join('\n'));
        //     }
        // })
        //
        // if (message.length !== 0) {
        //     alert(message.join('\n'));
        // }
    // });
});

function submitFormData(url, data) {
    return new Promise(function(resolve, reject) {
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
            },
            body: data
        }).then(function(response) {
            resolve(response.json());
            if (response.ok) {
                // If the response is successful, resolve the promise with the parsed JSON data
                resolve(response.json());
            } else {
                // If the response is not successful, reject the promise with an error message
                reject('Error: ' + response.status);
            }
        }).catch(function(error) {
            // If there is an error in the request, reject the promise with the error message
            reject('Request failed: ' + error);
        });
    });
}

function validation(target) {
    let result = [];
    let message = [];

    let name = target.find('[name="name"]').val().trim();
    let email = target.find('[name="email"]').val().trim();

    let nameRegex = /^.{3,30}$/;
    if (name === '') {
        message.push('Name is required');
    } else if (!nameRegex.test(name)) {
        message.push('Name should be between 3 and 30 characters');
    }

    let emailRegex = /^\S+@\S+\.\S+$/;
    if (email === '') {
        message.push('Email is required');
    } else if (!emailRegex.test(email)) {
        message.push('Invalid email format');
    }

    if (message.length !== 0) {
        result.push({
            status: message.length === 0,
            no: null,
            message: message,
        });
    }

    return result;
}

function validationFile() {
    let result = [];

    document.querySelectorAll('[name="files[]"]')
        .forEach((getFile, no) => {
            let message = [];
            let file = getFile.files[0];
            if (file !== undefined) {
                if (file.type !== 'application/pdf') {
                    message.push(`Invalid file type`);
                } else if (file.size > (1024 * 100)) {
                    message.push(`File size exceeds the limit: ${file.size}`);
                }

                result.push({
                    status: message.length === 0,
                    no: no,
                    message: message,
                });
            }
        });

    if (result.length === 0) {
        result.push({
            status: false,
            no: null,
            message: ['Please select one pdf files at least'],
        });
    }

    return result;
}
