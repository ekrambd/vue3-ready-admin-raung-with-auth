import { createStore } from 'vuex'; 

const store = createStore({
  state: {
    token: localStorage.getItem('token') || null, // Initialize token to null if not found in localStorage
  },

  mutations: {
    // Update token
    UPDATE_TOKEN(state, payload) {
      state.token = payload;
    }
  },

  actions: {
    setToken({ commit }, payload) {
      localStorage.setItem('token', payload);
      commit('UPDATE_TOKEN', payload);
    },

    removeToken({ commit }) {
      localStorage.removeItem('token');
      commit('UPDATE_TOKEN', null); // Set token to null when removing
    }
  },

  getters: {
    // Get token from state
    getToken(state) {
      return state.token;
    }
  }
});

export default store;
