import anime from 'animejs';


//-------------------------[PREPARATION]--------------------------------------->


//-----------------functions of preparation cards slider----------------------->


/**
 * After page load prepares cards, turning them in the direction of future animation.
 */
let prepareAnimation = function (param) {
    let allCards = document.getElementsByClassName("dancer-profile-container")
    let arrows = document.getElementsByClassName("cardSVGArrow")

    for (let card = 0; card < allCards.length; card++) {
        switch (param) {
            case 0: {
                if (card === 0) {
                    allCards[card].setAttribute("data-position", card)
                    allCards[card].classList.add("dancer-profile-card-current")
                    arrows[card].classList.add("arrowShowed")
                } else {
                    allCards[card].classList.add("dancer-profile-card-prepared")
                    allCards[card].setAttribute("data-position", card)
                }
            }
                break;
            case 1: {
                allCards[card].classList.add("dancer-profile-card-prepared")
                allCards[card].setAttribute("data-position", card)

            }
                break;
        }
    }
}


//-------------------------[CARD SELECT EVENT HANDLING]------------------------------->


//-----------------functions of animations of card select event----------------------->


/**
 * This function starts after selected card click.
 *
 * Realise width changing of the .dancers-profile container and creates the effect of card moving.
 */
let startAnimation = function () {
    let allCards = document.getElementsByClassName("dancer-profile-container")
    let card = allCards[0]
    let computedStyle = window.getComputedStyle(card)
    let parentNodeOfCards = document.getElementsByClassName("dancers-profiles")[0]
    let cardWidth = parseFloat(computedStyle.width)
    let cardMargin = parseFloat(computedStyle.marginLeft) + parseFloat(computedStyle.marginRight)
    let realCardSize = cardWidth + cardMargin
    let cardPosition = parseFloat(this.getAttribute("data-position"))
    let arrows = document.getElementsByClassName("cardSVGArrow")
    let currentArrow = arrows[cardPosition]
    parentNodeOfCards.style.width = (((realCardSize * cardPosition) + 800) + (realCardSize * cardPosition - 1)) + "px"

    swapCardStyle(allCards, cardPosition, this, arrows)
    showArrowOnCurrentCard(cardPosition, currentArrow)
}


/**
 * This function will show arrow that open full description window
 *
 * @param cardPosition
 * @param currentArrow
 */
let showArrowOnCurrentCard = function (cardPosition, currentArrow) {
    currentArrow.classList.remove("arrowHidden")
    currentArrow.classList.add("arrowShowed")
}


/**
 * Realise changing the direction of the cards on both sides of the current card, and selecting the current card as main.
 *
 * @param allCards Array of all cards on page
 * @param cardPosition Current card position
 * @param currentElem Current clicked element
 * @param arrows Array of arrows of cards
 */
let swapCardStyle = function (allCards, cardPosition, currentElem, arrows) {
    for (let card = 0; card < allCards.length; card++) {
        if (card < cardPosition) {
            arrows[card].classList.remove("arrowShowed")
            arrows[card].classList.add("arrowHidden")
            allCards[card].classList.remove("dancer-profile-card-prepared")
            allCards[card].classList.remove("dancer-profile-card-current")
            allCards[card].classList.add("dancer-profile-card-reversed")
        } else {
            arrows[card].classList.remove("arrowShowed");
            arrows[card].classList.add("arrowHidden")
            allCards[card].classList.remove("dancer-profile-card-reversed")
            allCards[card].classList.remove("dancer-profile-card-current")
            allCards[card].classList.add("dancer-profile-card-prepared")
        }
    }
    currentElem.classList.remove("dancer-profile-card-prepared")
    currentElem.classList.add("dancer-profile-card-current")
}


//-------------------------[HANDLING EVENT OF CLICK ON CARD ARROW]--------------------------------->


//-----functions of animation of hiding card slider and than, showing fill description section----->


/**
 * This function will called after arrow button pressed on selected card.
 *
 * This will start animation that show full information block of selected dancer after all cards of dancers will be hidden.
 */
let cardSelect = function () {
    let slider = document.getElementsByClassName("dancers-profiles")[0]
    anime({
        targets: '.dancer-profile-container',
        opacity: 0,
        perspective: 450,
        rotateY: 90,
        delay: anime.stagger(100),
        complete: function (anim) {
            setTimeout(function () {
                slider.style.display = "none"
            }, 1000)
        }
    });
    setTimeout(function () {
        slider.style.display = "none"
        startAnimateFullDescription()
    }, 500)
}


/**
 * This function should to be called from { cardSelect() } function.
 *
 * This will start animate all elements from full description window, and at the end, full content from this will be showed.
 */
let startAnimateFullDescription = function () {
    anime({
        targets: '.profile-container-full-description',
        opacity: 1,
        perspective: 450,
        rotateY: 5,
        translateX: 0
    })
    anime.timeline({
        duration: 250
    }).add({
        targets: '.man-info-container',
        width: 100 + '%',
        height: 100 + '%',
        opacity: 1,
        easing: 'linear'
    }).add({
        targets: '.man-main-info-container, .man-additional-info',
        delay: anime.stagger(400),
        translateX: 0
    })

}


//-----------[HANDLING OF BUTTON CLOSE CLICK ON FULL DESCRIPTION SECTION]--------------------------->


//--------functions of animation of hiding full-description and than, showing slider again---------->


/**
 * This function start realise hide full description block and that's will start show card slider animation .
 */
let startHideFullDescription = function () {
    let slider = document.getElementsByClassName("dancers-profiles")[0]

    anime({
        targets: '.profile-container-full-description',
        opacity: 0,
        perspective: 450,
        rotateY: 0,
        translateX: 0
    })
    anime.timeline({
        duration: 250
    }).add({
        targets: '.man-main-info-container, .man-additional-info',
        delay: anime.stagger(400),
        translateX: 0
    }).add({
        targets: '.man-info-container',
        width: 0,
        height: 0,
        opacity: 0,
        easing: 'linear'
    })

    setTimeout(function () {
        slider.style.display = "flex"
        showSliderAfterFullDescriptionHided()
    }, 500)
}


/**
 * This function realise show slider animation after full description will be hided.
 */
let showSliderAfterFullDescriptionHided = function () {
    let cards = document.getElementsByClassName("dancer-profile-container")
    anime({
        targets: '.dancer-profile-container',
        opacity: 1,
        perspective: 450,
        rotateY: 0,
        delay: anime.stagger(100),
        complete: function () {
            for (let card = 0; card < cards.length; card++) {
                cards[card].setAttribute("style", "")
            }
            prepareAnimation(1);
        }
    });
}


//------------------------------------------------------------------------------------->


//------------------------------------export section----------------------------------->


export {
    prepareAnimation, startAnimation, cardSelect, startHideFullDescription
}