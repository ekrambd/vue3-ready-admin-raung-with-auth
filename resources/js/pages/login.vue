<template>
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                  </div>
                  <form class="user" @submit.prevent="login">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" v-model="form.email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password" required="">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
</template>

<script type="text/javascript">

	export default{
		data(){
			return{
				form:{
					email: '',
					password: '',
				},
			}
		},
		methods:{

			login(){
        		axios.post('/api/login/',this.form)
        		.then((response) => {
                var success = response.data.success;
                if(!success)
                {    
                	this.$toast.error(response.data.message);
                }else{

                	let token = response.data.data.token;
                  let store = this.$store;
                    store.dispatch('setToken',token);
                	this.$toast.success(response.data.message);
                	this.$router.push({ name: 'Dashboard' })
                }
        		})
        		.catch(error => {
				      console.error('Error during logout:', error);
				    });
    	   },
			
		},
	}
</script>

<style>
</style>
