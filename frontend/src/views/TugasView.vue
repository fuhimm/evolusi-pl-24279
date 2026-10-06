<template>
  <div class="tugas">
    <h1>Daftar Tugas</h1>
    <div v-if="loading">Memuat...</div>
    <div v-else-if="error">{{ error }}</div>
    <div v-else-if="tugas.length === 0">Tidak ada tugas.</div>
    <ul v-else>
      <li v-for="t in tugas" :key="t.id">
        {{ t.judul }} - {{ formatTaskStatus(t.selesai) }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { formatTaskStatus } from '../utils/taskStatus'

const tugas = ref([])
const loading = ref(true)
const error = ref(null)

onMounted(async () => {
  try {
    const apiUrl = import.meta.env.VITE_API_URL || 'http://127.0.0.1:8088'
    const res = await fetch(`${apiUrl}/api/tugas`)
    if (!res.ok) throw new Error('Gagal mengambil data')
    tugas.value = await res.json()
  } catch (err) {
    error.value = err.message
  } finally {
    loading.value = false
  }
})
</script>
