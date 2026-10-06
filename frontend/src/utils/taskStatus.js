export function formatTaskStatus(selesai) {
    if (typeof selesai === 'undefined' || selesai === null) return 'Tidak Diketahui';
    return selesai ? 'Selesai' : 'Belum Selesai';
}
