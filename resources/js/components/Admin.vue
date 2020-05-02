<template>
	<v-app id="inspire">
		<v-navigation-drawer v-model="drawer" app clipped>
			<v-list dense>

				<v-list-item link to="/admin">
					<v-list-item-action>
						<v-icon>mdi-view-dashboard</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title>Dashboard</v-list-item-title>
					</v-list-item-content>
				</v-list-item>

				<v-list-group
					v-if="$auth.isAdmin()"
					v-for="item in items"
					:key="item.title"
					v-model="item.active"
					:prepend-icon="item.action"
					no-action
				>
					<template v-slot:activator>
						<v-list-item-content>
							<v-list-item-title v-text="item.title"></v-list-item-title>
						</v-list-item-content>
					</template>

					<v-list-item
						v-for="subItem in item.items"
						:key="subItem.title"
						@click=""
						:to="subItem.link"
					>
						<v-list-item-action>
							<v-icon>{{ subItem.action }}</v-icon>
						</v-list-item-action>
						<v-list-item-content>
							<v-list-item-title v-text="subItem.title"></v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list-group>

				<v-list-item link to="/admin/settings">
					<v-list-item-action>
						<v-icon>mdi-settings</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title>Settings</v-list-item-title>
					</v-list-item-content>
				</v-list-item>

				<v-list-item link to="/admin/developer">
					<v-list-item-action>
						<v-icon>mdi-settings</v-icon>
					</v-list-item-action>
					<v-list-item-content>
						<v-list-item-title>Developer</v-list-item-title>
					</v-list-item-content>
				</v-list-item>

			</v-list>
		</v-navigation-drawer>

		<v-app-bar app clipped-left >
			<v-app-bar-nav-icon @click.stop="drawer = !drawer" />
			<v-toolbar-title>Application</v-toolbar-title>

			<v-spacer></v-spacer>

			<v-menu offset-y>
				<template v-slot:activator="{ on }">
					<v-btn text icon @click="markAsRead" v-on="on">
						<v-badge color="red" :content="unreadNotifications.length" overlap>
							<v-icon>mdi-bell</v-icon>
						</v-badge>
					</v-btn>
				</template>
				<v-list>
					<v-list-item :class="{'green': notification.read_at==null}" @click="markAsRead" v-for="notification in allNotifications" :key="notification.id">
						<v-list-item-content>
							<v-list-item-title>{{ notification.data.createdUser.name }} has just registered on {{ notification.created_at }}</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list>
			</v-menu>

			<v-menu offset-y>
				<template v-slot:activator="{ on }">
					<v-btn icon text v-on="on">
						<v-avatar size="30px">
				         <img src="https://via.placeholder.com/150" alt="avatar">
			         </v-avatar>
					</v-btn>
				</template>
				<v-list class="pa-0">
					<v-list-item>
						<v-list-item-content>
							<v-list-item-title>{{ user.name }}</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list>
				<v-list class="pa-0">
					<v-list-item @click="logout" ripple="ripple" rel="noopener">
						<v-list-item-action>
							<v-icon>mdi-account-circle</v-icon>
						</v-list-item-action>
						<v-list-item-content>
							<v-list-item-title>Logout</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list>
			</v-menu>

		</v-app-bar>

		<v-content>
			<v-container class="fill-height" fluid>

				<v-layout>
					<v-flex>
						<router-view></router-view>
					</v-flex>
				</v-layout>

			</v-container>
		</v-content>

		<v-footer app>
			<span>&copy; 2019</span>
		</v-footer>
	</v-app>
</template>

<script>
	export default {
		// props: {
		// 	source: String,
		// },

		data: () => ({
			drawer: null,
			allNotifications: [],
			unreadNotifications: [],
			items: [
				{
					action: 'mdi-account-circle',
					title: 'User Management',
					active: false,
					items: [
						{ title: 'Users', action: 'mdi-account-circle', link: '/admin/users' },
						{ title: 'Roles', action: 'mdi-account-circle', link: '/admin/roles' },
						{ title: 'Permissions', action: 'mdi-account-circle', link: '/admin/permissions' },
					],
				},
			],
		}),
		props:['user'],
		watch: {
			allNotifications(val) {
				this.unreadNotifications = this.allNotifications.filter(notification => {
					return notification.read_at == null;
				})
			}
		},

		methods: {
			logout() {
				axios.post("/logout").then(response => window.location.reload());
			},
			markAsRead() {
				axios.get('/mark-all-read/' + this.user.id)
					.then(response => {
						this.unreadNotifications = [];
					});
			}
		},

		created () {
			this.$vuetify.theme.dark = true
			// console.log('user ', window.user);
			this.allNotifications = this.user.notifications;

			this.unreadNotifications = this.allNotifications.filter(notification => {
				return notification.read_at == null;
			});

			// Echo.join(`chat`)
			//     .here((users) => {
			//     	console.log('present user', users);
			//     })
			//     .joining((user) => {
			//         console.log(user.name);
			//     })
			//     .leaving((user) => {
			//         console.log(user.name);
			//     });

			Echo.private('App.User.' + this.user.id)
			.notification(notification => {
			        // console.log(notification, 'new notification on realtime');

			        this.allNotifications.unshift(notification.notification);
			    });
		},
	}
</script>