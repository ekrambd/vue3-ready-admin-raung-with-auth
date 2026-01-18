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
                      <input
                        type="email"
                        class="form-control"
                        v-model="form.email"
                        placeholder="Enter Email Address"
                        required
                      >
                    </div>
                    <div class="form-group">
                      <input
                        type="password"
                        class="form-control"
                        v-model="form.password"
                        placeholder="Password"
                        required
                      >
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
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

<script setup>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'
import { useToast } from 'vue-toast-notification';
import axios from 'axios'

// Reactive form state
const form = reactive({
  email: '',
  password: ''
})

// Vue Router and Vuex
const router = useRouter()
const store = useStore()

const toast = useToast();

// Login function
const login = async () => {
  try {
    const response = await axios.post('/api/login/', form)
    const { success, message, data } = response.data

    if (!success) {
      // Show error toast
      toast.error(message, { position: 'top-right', duration: 1000 });
      return
    }

    // Save token in Vuex store
    store.dispatch('setToken', data.token)

    toast.success(message, { position: 'top-right', duration: 1000 });

    // Redirect to dashboard
    router.push({ name: 'Dashboard' })
  } catch (error) {
    console.error('Login error:', error)
  }
}
</script>

<style scoped>

</style>
