import './bootstrap';
import sortable from './sortable'
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

Alpine.plugin(sortable)

Livewire.start()
