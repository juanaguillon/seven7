var $window = $(window);
var $document = $(document);


/* Inicializar Plugins */
function initiPlugins(){
  var privacyWizardSteps = {
    headerTag: "h3.wizard_title",
    bodyTag: "div.wizard_content",
    transitionEffect: "slideLeft",
    // autoFocus: true,
    // enableAllSteps: true,
    enableFinishButton:false,
    labels: {
      next: "Siguiente",
      previous: "Anterior",
      current: "",
      finish:"",
      
    }
  };
  // $("#privacy_wizard").steps(privacyWizardSteps);
}

$window.on("load",function(){
  initiPlugins()
})
