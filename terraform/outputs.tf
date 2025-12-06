output "instance_public_ip" {
  description = "The public IP address of the web server"
  value       = aws_eip.lb.public_ip
}

output "ssh_command" {
  description = "Command to SSH into the instance"
  value       = "ssh -i ~/.ssh/id_rsa ubuntu@${aws_eip.lb.public_ip}"
}
