$(document).ready(function() {
    $('select.ui.dropdown').dropdown();

    $('#service-select').on('change', function () {
        $('#next-one').removeClass('disabled');
    });
});

setTimeout(function(){
    $('#order-form').removeClass('loading');
}, 750);

function getSelectedValue(x)
{
    let res = [];
    let options = x && x.options;
    let opt;

    for (let i=0; i<options.length; i++) {
        opt = options[i];

        if (opt.selected) {
            res.push(opt.text);
        }
    }
    return res;
}

function executeStepOne()
{
    // Validate input
    let service = document.getElementById('service-select');
    if (service.value == "") {
        return;
    }
    
    $('#loader').css({
        'display': 'block'
    });

    let stepBarOne = document.getElementById('stepbar-one');
    let stepBarTwo = document.getElementById('stepbar-two');
    
    setTimeout(function() {
        $('#loader').css({
            'display': 'none'
        });
        stepBarOne.classList.add('completed');
        stepBarOne.classList.remove('active');
        stepBarTwo.classList.remove('disabled');
        stepBarTwo.classList.add('active');
        
        $('#step-one').css({
            'display': 'none'
        });
        $('#step-two').css({
            'display': 'block'
        });
    }, 500);
}

function backToStepOne()
{
    $('#loader').css({
        'display': 'block'
    });

    let stepBarOne = document.getElementById('stepbar-one');
    let stepBarTwo = document.getElementById('stepbar-two');

    setTimeout(function() {
        $('#loader').css({
            'display': 'none'
        });
        stepBarOne.classList.remove('completed');
        stepBarOne.classList.add('active');
        stepBarTwo.classList.add('disabled');
        stepBarTwo.classList.remove('active');

        $('#step-two').css({
            'display': 'none'
        });
        $('#step-one').css({
            'display': 'block'
        });
    }, 500);
}

function executeStepTwo()
{
    $('#loader').css({
        'display': 'block'
    });   
    
    let stepBarTwo = document.getElementById('stepbar-two');
    let stepBarThree = document.getElementById('stepbar-three');

    // update the selected item
    let selectService = document.getElementById('service-select');
    let selectItems = document.getElementById('item-select-options');
    let itemToList  = document.getElementById('item-selected-list');
    let arr = getSelectedValue(selectItems);
    
    document.getElementById('detail-service').innerHTML = selectService.options[selectService.selectedIndex].text;
    for (let i=0; i<arr.length; i++) {
        let node = document.createElement("li");
        node.innerHTML = arr[i];
        itemToList.appendChild(node);
    }

    setTimeout(function() {
        $('#loader').css({
            'display': 'none'
        });
        stepBarTwo.classList.add('completed');
        stepBarTwo.classList.remove('active');
        stepBarThree.classList.remove('disabled');
        stepBarThree.classList.add('active');
        
        $('#step-two').css({
            'display': 'none'
        });
        $('#step-three').css({
            'display': 'block'
        });
    }, 500);
}

function backToStepTwo()
{
    $('#loader').css({
        'display': 'block'
    });

    let stepBarTwo = document.getElementById('stepbar-two');
    let stepBarThree = document.getElementById('stepbar-three');

    let itemToList  = document.getElementById('item-selected-list');
    itemToList.innerHTML = "";

    setTimeout(function() {
        $('#loader').css({
            'display': 'none'
        });
        stepBarTwo.classList.remove('completed');
        stepBarTwo.classList.add('active');
        stepBarThree.classList.add('disabled');
        stepBarThree.classList.remove('active');

        $('#step-two').css({
            'display': 'block'
        });
        $('#step-three').css({
            'display': 'none'
        });
    }, 500);
}