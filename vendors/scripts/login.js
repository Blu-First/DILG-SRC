function formInput_Validator(formInputID) {
    this.formInputID = formInputID;
    this.typingFinished = false;
    this.blurTimeout;
    this.isInvalid_input = false;
  }
  
  formInput_Validator.prototype.initializeValidation = function() {
    const self = this;
  
    $(`#${this.formInputID}`).on('keyup click', function() {
      clearTimeout(self.blurTimeout);
  
      self.blurTimeout = setTimeout(function() {
        self.typingFinished = true;
      }, 100);
      console.log("Typing in " , self.formInputID);
    });
  
    $(`#${this.formInputID}`).on('blur', function() {
      if (self.typingFinished) {
        const formInput_DOM = document.querySelector(`#${self.formInputID}`);
        const formInput_Value = formInput_DOM ? formInput_DOM.value.trim() : "";
        const formInput_Alert = document.querySelector(`#${self.formInputID}-alert`);
        console.log(formInput_Alert);
  
        if (formInput_Value === "") {
          $(formInput_DOM).addClass('form-control-danger');
          $(formInput_Alert).addClass('has-danger');
          $(formInput_Alert).text('Fill out this field.');
          self.isInvalid_input = true;
        }else if (self.isInvalid_input && formInput_Value !== "") {
            $(formInput_DOM).removeClass('form-control-danger');
            $(formInput_Alert).removeClass('has-danger');
           $(formInput_Alert).html('&nbsp;');
           self.isInvalid_input = false;
         }
      }
      console.log("Out of focus in ", self.formInputID);
      self.typingFinished = false;
    });
  };
  
  // Example usage:
  const userIdValidator = new formInput_Validator('userName');
  userIdValidator.initializeValidation();
  const userPwdValidator = new formInput_Validator('userPwd');
  userPwdValidator.initializeValidation();



  $('.icon-show-pwd').on('click', function(){
    let pwdInput = $('#userPwd');
    let currentType = pwdInput.prop('type');
    
    if (currentType === 'password') {
        pwdInput.prop('type', 'text');
    } else {
        pwdInput.prop('type', 'password');
    }
  });


  
  
  