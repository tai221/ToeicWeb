<template>
<!--    <div>-->
<!--        <span>Enter your email:</span><br>-->
<!--        <input type="text" v-model="email"><br>-->
<!--        <button type="submit" v-on:click="sendEmail()">Send email</button><br>-->
<!--        <span>{{message}}</span>-->
<!--    </div>-->
<!--    -->
    <div>
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>Enter your email here.</p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" >

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" name="email" placeholder="email address" class="form-control"  type="email" v-model="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit" v-on:click="sendEmail()">
                                    </div>
                                    <span class="message">{{message}}</span>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import { sendMail } from '../../api/auth'

export default {
  name: 'InputEmail',
  data() {
    return {
      email: '',
      message: ''
    }
  },
  methods: {
    sendEmail() {
      event.preventDefault()
      const app = this
      const email = { email: app.email }
      sendMail(email)
        .then((response) => {
          app.message = response.data.message
        })
        .catch((error) => {
          console.log('loi')
          console.log(error)
        })
    }
  }
}
</script>

<style scoped>
    .form-gap {
        padding-top: 70px;
    }
    .message {
        color: red;
    }
</style>
