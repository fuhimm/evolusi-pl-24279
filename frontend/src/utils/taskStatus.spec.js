import { describe, it, expect } from 'vitest'
import { formatTaskStatus } from './taskStatus'

describe('formatTaskStatus', () => {
    it('returns Selesai when true', () => {
        expect(formatTaskStatus(true)).toBe('Selesai Gagal')
    })
    
    it('returns Belum Selesai when false', () => {
        expect(formatTaskStatus(false)).toBe('Belum Selesai')
    })

    it('returns Tidak Diketahui when null', () => {
        expect(formatTaskStatus(null)).toBe('Tidak Diketahui')
    })
})
