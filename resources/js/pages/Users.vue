<template>
	<v-data-table :headers="headers" :items="tableData" class="elevation-1" :search="search">

		<template v-slot:top>
			<v-toolbar flat>
				<v-toolbar-title>Users</v-toolbar-title>
				<v-divider class="mx-4" inset vertical></v-divider>

				<v-dialog v-model="dialog" max-width="500px">
					<template v-slot:activator="{ on }">
						<v-btn color="primary" dark class="mb-2" v-on="on">New Item</v-btn>
					</template>
					<v-card>
						<v-card-title>
							<span class="headline">{{ formTitle }}</span>
						</v-card-title>

						<v-card-text>
							<v-container>
								<v-row>
									<v-col cols="12" xs="12">
										<v-text-field v-model="editedItem.name" label="Username"></v-text-field>
									</v-col>

									<v-col cols="12" xs="12">
										<v-text-field v-model="editedItem.email" label="Email"></v-text-field>
									</v-col>

									<v-col cols="12" xs="12">
										<v-text-field
											v-model="editedItem.password"
											label="Password"
											:append-icon="showPassword1 ? 'mdi-eye' : 'mdi-eye-off'"
											:rules="[rules.required, rules.min]"
											:type="showPassword1 ? 'text' : 'password'"
											name="input-10-1"
											hint="At least 8 characters"
											counter
											@click:append="showPassword1 = !showPassword1"
										></v-text-field>
									</v-col>

									<v-col cols="12" xs="12">
										<v-text-field
											v-model="editedItem.confirm_password"
											label="Confirm Password"
											:append-icon="showPassword2 ? 'mdi-eye' : 'mdi-eye-off'"
											:rules="[rules.required, rules.min, rules.emailMatch]"
											:type="showPassword2 ? 'text' : 'password'"
											name="input-10-1"
											hint="At least 8 characters"
											counter
											@click:append="showPassword2 = !showPassword2"
										></v-text-field>
									</v-col>

									<v-col cols="12" xs="12">
										<h3>Roles</h3>
										<v-select
											v-model="editedItem.role"
											:items="allRoles"
											label="Roles"
											item-text="name"
											return-object
											chips
										></v-select>
									</v-col>

									<v-col cols="12" xs="12">
										<v-select
											v-model="editedItem.permissions"
											:items="allPermissions"
											label="Permissions"
											item-text="name"
											item-value="id"
											return-object
											multiple
											chips
										></v-select>
									</v-col>
								</v-row>
							</v-container>
						</v-card-text>

						<v-card-actions>
							<v-spacer></v-spacer>
							<v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
							<v-btn color="blue darken-1" text @click="save">Save</v-btn>
						</v-card-actions>
					</v-card>
				</v-dialog>

				<v-spacer></v-spacer>
				<v-col cols="3" xs="3">
					<v-text-field
						v-model="search"
						append-icon="mdi-magnify"
						label="Search"
						single-line
						hide-details
			      ></v-text-field>
			   </v-col>

			</v-toolbar>
		</template>

		<template v-slot:item.actions="{ item }">
			<v-icon small class="mr-2" @click="editItem(item)">mdi-pencil</v-icon>
			<v-icon small @click="deleteItem(item)">mdi-delete</v-icon>
		</template>

		<template v-slot:no-data>
			<v-btn color="primary" @click="initialize">Reset</v-btn>
		</template>

	</v-data-table>
</template>

<script>
	export default {
		data: () => ({
			search: '',
			dialog: false,
			headers: [
				{ text: 'Username', value: 'name' },
				{ text: 'Email', value: 'email' },
				{ text: 'Role', value: 'role.name' },
				{ text: 'Created', value: 'created_at' },
				{ text: 'Actions', value: 'actions', sortable: false },
			],
			tableData: [],
			editedIndex: -1,
			allRoles: [],
			allPermissions: [],
			editedItem: {
				name: '',
				email: '',
				role: {},
				permissions: [],
				created_at: '',
			},
			defaultItem: {
				name: '',
				email: '',
				role: {},
				permissions: [],
				created_at: '',
			},
			showPassword1: false,
			showPassword2: false,
			password: 'Password',
			rules: {
				required: value => !!value || 'Required.',
				min: v => v.length >= 8 || 'Min 8 characters',
				emailMatch: () => ('The email and password you entered don\'t match'),
			}
		}),

		computed: {
			formTitle () {
				return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
			},
		},

		watch: {
			dialog (val) {
				val || this.close()
			},
		},

		created () {
			this.initialize()
		},

		methods: {
			initialize () {
				if (this.$auth.isAdmin()) {
					axios.get('/api/users')
						.then(response => this.tableData = response.data.data);

					axios.get('/api/roles')
						.then(response => this.allRoles = response.data.data);

					axios.get('/api/permissions')
						.then(response => this.allPermissions = response.data.data);
				}
			},

			editItem (item) {
				this.editedIndex = this.tableData.indexOf(item)
				this.editedItem = Object.assign({}, item)
				this.dialog = true
			},

			deleteItem (item) {
				const index = this.tableData.indexOf(item)
				confirm('Are you sure you want to delete this item?') && this.tableData.splice(index, 1);

				axios.delete('/api/users/' + item.id)
					.then(response => console.log(response.data));
			},

			close () {
				this.dialog = false
				setTimeout(() => {
					this.editedItem = Object.assign({}, this.defaultItem)
					this.editedIndex = -1
				}, 300)
			},

			save () {
				if (this.editedIndex > -1) {
					Object.assign(this.tableData[this.editedIndex], this.editedItem);

					axios.put('/api/users/' + this.editedItem.id, this.editedItem)
						.then(response => console.log(response.data));
				} else {
					this.tableData.push(this.editedItem);

					axios.post('/api/users/', this.editedItem)
						.then(response => console.log(response.data));
				}
				this.close();
			},
		},
	}
</script>