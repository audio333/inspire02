<template>
  <v-timeline>
    <v-timeline-item
      v-for="(activity, i) in activities"
      :key="i"
      small
    >
      <template v-slot:opposite>
        <span
          :class="`headline font-weight-bold`"
          v-text="activity.created_at"
        ></span>
      </template>
      <div class="py-4">
        <h2 :class="`headline font-weight-light mb-4`">Lorem ipsum</h2>
        <div>
          <!-- {{ activity.causer.name }}  -->
          {{ activity.description }} {{ activity.subject_type }}
        </div>
      </div>
    </v-timeline-item>
  </v-timeline>
</template>

<script>
  export default {
    data: () => ({
      activities: []
    }),

    created() {
      axios.get('/api/activities/' + window.user.user.id).then(response => {
        this.activities = response.data;
      });
    }
  }
</script>