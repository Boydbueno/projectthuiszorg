(function() {

  //$(".jobs:first").addClass("tourSecond");

  var completeShepherd, init, setupShepherd;

  init = function() {
    return setupShepherd();
  };

setupShepherd = function() {
    var shepherd;
    shepherd = new Shepherd.Tour({
      defaults: {
        classes: 'shepherd-element shepherd-open shepherd-theme-arrows',
        scrollTo: true
      }
    });


	shepherd.addStep('welkom', {
  		text: ['Welkom bij Rework, leuk dat u een account gemaakt heeft! Dit is een korte tour door de website om u snel op gang te helpen.'],
  		attachTo: '.progressSmall top', //.progressSmall
  		classes: 'shepherd shepherd-open shepherd-theme-arrows shepherd-transparent-text',
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
  shepherd.addStep('Eerste job', {
      title: 'Uw eerste job',
      text: 'Dit is maar een van de opdrachten die op de website staan. Er zijn 4 verschillende categorien waar een opdracht in kan staan. Fysiek, adviserend, handarbeid of technisch werk!',
      attachTo: '.progress bottom',
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
  shepherd.addStep('Bekijk opdracht', {
      title: 'Bekijk opdracht',
      text: 'Als u eenmaal een opdracht gevonden heeft waar u aan wilt meewerken kunt u de opdracht bekijken eventueel aanmelden',
      attachTo: '.jobs left',
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
  shepherd.addStep('Mijn opdrachten', {
      title: 'Uw opdrachten',
      text: 'Als u eenmaal bent aangemeld voor een aantal opdrachten, komen deze in uw eigen overzicht. Van hieruit kunt u de status zien, en uw voortgang aangeven!',
      attachTo: '.menuLink top',
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
   