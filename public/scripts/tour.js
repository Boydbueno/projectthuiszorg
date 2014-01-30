var tDone = document.cookie;

if(tDone !== "tourdone") {

  (function() {

    var completeShepherd, init, setupShepherd;

    init = function() {
      document.getElementsByTagName('body')[0].className+='tour';
      return setupShepherd();
    };

  setupShepherd = function() {
      var shepherd;
      shepherd = new Shepherd.Tour({
        defaults: {
          classes: 'shepherd-element shepherd-open shepherd-theme-arrows'
          
        }
      });


  	shepherd.addStep('Welkom!', {
    		text: ['Welkom bij Rework, leuk dat u een account gemaakt heeft! Dit is een korte tour door de website om u snel op gang te helpen.'],
    		attachTo: '.content .block:first-child top',
    		classes: 'shepherd shepherd-open shepherd-theme-arrows shepherd-transparent-text',
        scrollTo: false,
    		buttons: [
          {
            text: 'Stop',
            classes: 'shepherd-button-secondary',
            action: function() {
              completeShepherd();
              return shepherd.hide();
            }
          }, {
            text: 'Volgende',
            action: shepherd.next,
            classes: 'shepherd-button-example-primary'
          }
        ]
  	});
    shepherd.addStep('Eerste opdracht', {
        title: 'Uw eerste opdracht',
        text: 'Dit is maar een van de opdrachten die op de website staan. Er zijn 4 verschillende categorien waar een opdracht in kan staan. Fysiek, adviserend, handarbeid of technisch werk!',
        attachTo: '.jobs article:first-child bottom',
        scrollTo: false,
        buttons: [
          {
            text: 'Terug',
            classes: 'shepherd-button-secondary',
            action: shepherd.back,
          }, {
            text: 'Volgende',
            action: shepherd.next
          }
        ]
      });
    shepherd.addStep('Bekijk opdracht', {
        title: 'Bekijk een opdracht',
        text: 'Als u eenmaal een opdracht gevonden heeft waar u aan wilt meewerken kunt u de opdracht bekijken eventueel aanmelden',
        attachTo: '.jobs article:first-child right',
        scrollTo: false,
        buttons: [
          {
            text: 'Terug',
            classes: 'shepherd-button-secondary',
            action: shepherd.back,
          }, {
            text: 'Volgende',
            action: shepherd.next
          }
        ]
      });
    shepherd.addStep('Mijn opdrachten', {
        title: 'Uw opdrachten',
        text: 'Als u eenmaal bent aangemeld voor een aantal opdrachten, komen deze in uw eigen overzicht. Van hieruit kunt u de status zien, en uw voortgang aangeven!',
        attachTo: 'header.mainMenu bottom',
        scrollTo: true,
        buttons: [
          {
            text: 'Terug',
            classes: 'shepherd-button-secondary',
            action: shepherd.back
          }, {
            text: 'Volgende',
            action: shepherd.next
          }
        ]
      });
    shepherd.addStep('Vriendenlijst', {
        title: 'Vriendenlijst',
        text: 'Dit is de vriendenlijst. Opdrachten doen is leuk, maar samen aan een opdracht werken is natuurlijk nog leuker. Als deze lijst eenmaal gevuld is, kunt u door te slepen uw vrienden uitnodigen om mee te helpen aan een opdracht',
        attachTo: '.friendList left',
        scrollTo: false,
        buttons: [
          {
            text: 'Terug',
            classes: 'shepherd-button-secondary',
            action: shepherd.back
          }, {
            text: 'Klaar',
            action: function() {
              completeShepherd();
              return shepherd.next();
            }
          }
        ]
      });
      return shepherd.start();
    };

    completeShepherd = function() {
      return $('body').addClass('shepherd-completed');
    };

    $(init);

  }).call(this);

  document.cookie = "tourdone";

}
   